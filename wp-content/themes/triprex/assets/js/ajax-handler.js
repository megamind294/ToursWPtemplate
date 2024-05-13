(function ($) {
     "use strict";

     let cart_info = triprex_ajax_handler?.cart_info;
     const post_type = triprex_ajax_handler?.post_type;
     triprex_calculate_total(cart_info);
     generateHTML(cart_info);

     if (triprex_ajax_handler?.post_type == 'tours') {
          // Daterange picker 
          $('input[name="daterange"]').daterangepicker({
               singleDatePicker: true,
               opens: 'left',
               minYear: '2024',
               minDate: moment(),
               locale: {
                    format: 'DD MMMM, YYYY'
               }
          }, function (start, end, label) {
               const booking_date = triprex_format_date(start.format('YYYY-MM-DD'));
               triprex_add_booking_date(booking_date);
               jQuery('.form-check.customdate .form-check-input[name="booking_date"]').val(start.format('YYYY-MM-DD'));
          });
          // Add tour date meta 
          $('.form-check .form-check-input').on('click', function (e) {
               const booking_date = $(this).val();
               triprex_add_booking_date(booking_date);
          });

     }


     // Activities data
     if (triprex_ajax_handler?.post_type == 'activities') {

          // Add tour date meta 
          $('.sidebar-booking-form.activities .form-group [name="inOut"]').on('click', function (e) {
               const booking_date = $(this).val();
               triprex_add_booking_date(booking_date);
          });

          $(function () {
               $('input[name="inOut"]').daterangepicker({
                    singleDatePicker: true,
                    showDropdowns: true,
                    minYear: 2024,
                    minDate: moment(),
                    locale: {
                         format: 'DD MMMM, YYYY'
                    }
               }, function (start, end, label) {
                    const booking_date = triprex_format_date(start.format('YYYY-MM-DD'));
                    triprex_add_booking_date(booking_date);
                    jQuery('.sidebar-booking-form.activities .form-group [name="inOut"]').val(start.format('YYYY-MM-DD'));
               });
          });
     }


     if (triprex_ajax_handler?.post_type == 'transport') {

          $('.sidebar-booking-form .transport-type .triprex-transport-tab-item').click(function () {
               const transport_key = $(this).children('.form-check').attr('transport-key');
               reset_booking_form_value(transport_key);
          });

          // calender
          let reserve_date = jQuery('input[name="reserve_date_single"]').val();
          if( !reserve_date ) {
               reserve_date = moment();
          }
          $(function () {
               $('input[name="inOut"]').daterangepicker({
                    singleDatePicker: true,
                    showDropdowns: true,
                    minYear: 2023,
                    minDate: moment(),
                    startDate: reserve_date,
                    locale: {
                         format: 'DD MMMM, YYYY'
                    }
               }, function (start, end, label) {
                    const booking_date = triprex_format_date(start.format('YYYY-MM-DD'));
                    triprex_add_booking_date(booking_date);
                    jQuery('.transport-sidebar .form-group [name="inOut"]').val(start.format('YYYY-MM-DD'));
               });
          });
     }

     if( triprex_ajax_handler?.post_type == 'hotel' ) {
          const currentYear = new Date().getFullYear();
          const dateRangeValue = jQuery('input[name="date_range_hidden"]').val();
          const dates = dateRangeValue.split(' - ');
          const startDateStr = `${dates[0]}-${currentYear}`;
          const endDateStr = `${dates[1]}-${currentYear}`;
          const startDate = moment(startDateStr, "DD-MMM-YYYY");
          const endDate = moment(endDateStr, "DD-MMM-YYYY");
          $('input[name="daterange"]').daterangepicker({
			opens: 'left',
               minYear: currentYear,
               startDate: startDate,
               endDate: endDate,
               minDate: moment(),
			locale: {
				format: 'DD MMMM, YYYY'
			}
		}, function (start, end, label) {
               updateCartInfo(start, end);
		});
          // updateCartInfo(startDate, endDate);
     }

    function updateCartInfo(start, end) {
          const hotel_booking_start = triprex_format_date(start.format('YYYY-MM-DD'));
          const hotel_booking_end = triprex_format_date(end.format('YYYY-MM-DD'));
          const bookingPeriod = `${hotel_booking_start} - ${hotel_booking_end}`;
          cart_info.pricing.Room.dependency.date.label = bookingPeriod;
          const date_quantity = calculateDaysBetweenDates(hotel_booking_start, hotel_booking_end);
          cart_info.pricing.Room.dependency.date.quantity = date_quantity;
          // Update price based on the start and end dates
          update_price(1, cart_info.pricing.Room.quantity, false, null, bookingPeriod, date_quantity);
          // Set the hidden input value to the formatted start date
          jQuery('.form-check.customdate .form-check-input[name="booking_date"]').val(start.format('YYYY-MM-DD'));
     }

     function triprex_format_date(__date, format = null) {
          const date = new Date(__date);
          const formattedDate = date.toLocaleDateString('en-US', {
               day: 'numeric',
               month: 'long',
               year: 'numeric'
          });
          return formattedDate;
     }

     function triprex_add_booking_date(booking_date) {
          if (cart_info.meta.hasOwnProperty('booking_date')) {
               cart_info.meta.booking_date.value = booking_date;
          } else {
               cart_info.meta.booking_date = {
                    label: "Booking Date : ",
                    value: booking_date
               };
          }
     }

     function reset_booking_form_value(transport_key) {
          $('.sidebar-booking-form .tab-content input[type="text"], .sidebar-booking-form .tab-content textarea').each(function () {
               if ($(this).attr('exclude-reset') !== 'true') {
                    if ($(this).attr('min') !== undefined) {
                         $(this).val($(this).attr('min'));
                    } else {
                         $(this).val('');
                    }
               }
          });

          $('.sidebar-booking-form .tab-content input[type="checkbox"], .sidebar-booking-form .tab-content input[type="radio"]').prop('checked', false);
          $('.sidebar-booking-form .tab-content select').prop('selectedIndex', 0);
          generate_cart_info_for_tab(transport_key);
     }


     function generate_cart_info_for_tab(transport_key) {
          if (post_type == 'transport') {
               if (!triprex_ajax_handler.post_type || !triprex_ajax_handler.post_id || !triprex_ajax_handler.ajax_url) {
                    return console.error('Something went wrong!!');
               }
               const nonce = triprex_ajax_handler.nonce;
               jQuery.ajax({
                    url: triprex_ajax_handler.ajax_url,
                    type: 'GET',
                    data: {
                         action: 'egns_generate_cart_info_for_tab',
                         nonce,
                         post_type: post_type,
                         post_id: triprex_ajax_handler.post_id,
                         transport_key,
                    },
                    beforeSend: function () {
                         jQuery('.booking-form-wrap').addClass('loading');
                    },
                    success: function (response) {
                         cart_info.pricing = response.data.data;
                         cart_info.services = {};
                         generateHTML(cart_info);
                         triprex_calculate_total(cart_info);
                         jQuery('.booking-form-wrap').removeClass('loading');
                    },
                    error: function (error) {
                         console.error(error);
                    }
               });
          }
     }

     // Handle add to cart 
     jQuery(document).on('click', '.egns_add_to_cart', function (event) {
          event.preventDefault();
          jQuery.ajax({
               url: triprex_ajax_handler.ajax_url,
               type: 'POST',
               data: {
                    action: 'egns_add_to_cart',
                    data: cart_info,
                    post_id: triprex_ajax_handler.post_id,
               },
               success: function (response) {
                    window.location.href = `${triprex_ajax_handler?.cart_url}`;
               },
               error: function (error) {
                    console.error(error);
               }
          });
     });

     // Package Overview
     function generate_service_structure(category, price, quantity) {
          const currency = triprex_ajax_handler?.currency;
          const totalPrice = price * quantity;
          if (parseInt(quantity) > 0) {
               return `
               <div class="single-total mb-30">
                   <span>${category}</span>
                   <ul>
                       <li><strong>${currency}${price}</strong> PRICE</li>
                       <li><i class="bi bi-x-lg"></i></li>
                       <li><strong>${quantity}</strong> QTY</li>
                   </ul>
                   <svg xmlns="http://www.w3.org/2000/svg" width="27" height="15" viewBox="0 0 27 15">
                       <path fill-rule="evenodd" clip-rule="evenodd" d="M23.999 5.44668L25.6991 7.4978L23.9991 9.54878H0V10.5743H23.1491L20.0135 14.3575L20.7834 14.9956L26.7334 7.81687L26.9979 7.4978L26.7334 7.17873L20.7834 0L20.0135 0.638141L23.149 4.42114H0V5.44668H23.999Z" />
                   </svg>
                   <div class="total">${currency}${totalPrice}</div>
               </div>`;
          } else {
               return '';
          }
     }

     // Generate HTML
     function generateHTML(data) {
          let content = '';
          Object.entries(data.pricing).forEach(([key, item]) => {
               content += generate_service_structure(item.label, parseInt(item.price), parseInt(item.quantity));
          });
          $('.booking-package-info').empty().html(content);
     }

     // Calculate price 
     function triprex_calculate_total(cart_data) {
          let total_price = 0;
          for (let key in cart_data.pricing) {
               if (cart_data.pricing[key].price) {
                    total_price += parseInt(cart_data.pricing[key].price) * parseInt(cart_data.pricing[key].quantity);
               }
          }
          for (let key in cart_data.services) {
               if (cart_data.services[key].price) {
                    total_price += parseInt(cart_data.services[key].price);
               }
          }
          $('.cart_total_price').html(total_price);
     }

     $(".booking-form-item-type .quantity-counter .quantity__minus").on("click", function (e) {
          // Quantity decrement
          e.preventDefault();
          var input = $(this).siblings(".quantity__input");
          var value = parseInt(input.val());
          const min = $(input).attr('min');
          const max = $(input).attr('max');
          if( $(this).hasClass('ajax-false') ) {
               if( value > max ) {
                    alert(`Max value can\'t be greater then ${max}`);
                    return;
               }
          }
          if (value > parseInt(min) ) {
               value--;
          }
          input.val(value.toString().padStart(2, "0"));
          // Pricing update
          const pricing_category_id = $(input).attr('pricing-category-id');
          const package_id = $(input).attr('package-key');
          if( !$(this).hasClass('ajax-false') ) {
               if( post_type == 'hotel' ) {
                    update_price( pricing_category_id, value, null, package_id, cart_info.pricing.Room.dependency.date.label, cart_info.pricing.Room.dependency.date.quantity );
               }else {
                    update_price( pricing_category_id, value, null, package_id )
               }
          }
     });

     $(".booking-form-item-type .checkbox-container .services_check").on("click", function (e) {
          const isChecked = e.target.checked;
          jQuery('.booking-form-wrap').addClass('loading');
          const service_key = $(this).val();
          const service_slug = $(this).attr('service-slug');
          let package_id;
          if (post_type == 'transport') {
               package_id = $(this).attr('package-key');
          }
          if (isChecked) {
               if (post_type == 'transport') {
                    update_price(service_key, 1, true, package_id)
               } else {
                    update_price(service_key, 1, true)
               }
          } else {
               setTimeout(() => {
                    delete cart_info.services[service_slug];
                    triprex_calculate_total(cart_info);
                    jQuery('.booking-form-wrap').removeClass('loading');
               }, 300);
          }
     });

     $(".booking-form-item-type .quantity-counter .quantity__plus").on("click", function (e) {
          // Quantity increment
          e.preventDefault();
          var input = $(this).siblings(".quantity__input");
          var value = parseInt(input.val());
          const max = $(input).attr('max');
          if( $(this).hasClass('ajax-false') ) {
               if( value >= max ) {
                    alert(`Max value can\'t be greater then ${max}`);
                    return;
               }
          }
          value++;
          input.val(value.toString().padStart(2, "0"));
          // Pricing update
          const pricing_category_id = $(input).attr('pricing-category-id');
          const package_id = $(input).attr('package-key');
          if( !$(this).hasClass('ajax-false') ) {
               if( post_type == 'hotel' ) {
                    update_price( pricing_category_id, value, null, package_id, cart_info.pricing.Room.dependency.date.label, cart_info.pricing.Room.dependency.date.quantity );
               }else {
                    update_price( pricing_category_id, value, null, package_id )
               }
          }
     });

     // Update price AJAX
     function update_price( _id, quantity, is_service = null, package_id = null, pricing_date_dep = null, pricing_date_qty = null ){
          
          const post_id = triprex_ajax_handler.post_id;
          const nonce = triprex_ajax_handler?.nonce;
          jQuery.ajax({
               url: triprex_ajax_handler.ajax_url,
               type: 'POST',
               data: {
                    action: 'triprex_calc_package_price',
                    nonce,
                    _id,
                    quantity,
                    is_service,
                    post_id,
                    post_type,
                    package_id,
                    pricing_date_dep,
                    pricing_date_qty,
               },
               beforeSend: function () {
                    jQuery('.booking-form-wrap').addClass('loading');
               },
               success: function (response) {
                    const data = response.data.data;
                    if (post_type == 'tours') {
                         if (is_service) {
                              cart_info.services = {
                                   ...cart_info.services,
                                   ...{
                                        ...cart_info.services[_id],
                                        ...data
                                   }
                              };
                         } else {
                              cart_info.pricing = {
                                   ...cart_info.pricing,
                                   ...{
                                        ...cart_info.pricing[_id],
                                        ...data
                                   }
                              };
                         }
                         triprex_calculate_total(cart_info);
                         console.log('cart-info', cart_info);
                         jQuery('.booking-form-wrap').removeClass('loading');
                         generateHTML(cart_info);
                    } else if (post_type == 'transport') {
                         if (is_service) {
                              cart_info.services = {
                                   ...cart_info.services,
                                   ...{
                                        ...cart_info.services[_id],
                                        ...data
                                   }
                              };
                         } else {
                              cart_info.pricing = {
                                   ...cart_info.pricing,
                                   ...{
                                        ...cart_info.pricing[_id],
                                        ...data
                                   }
                              };
                         }
                         triprex_calculate_total(cart_info);
                         jQuery('.booking-form-wrap').removeClass('loading');
                         generateHTML(cart_info);
                    } else if (post_type == 'activities') {
                         if (is_service) {
                              cart_info.services = {
                                   ...cart_info.services,
                                   ...{
                                        ...cart_info.services[_id],
                                        ...data
                                   }
                              };
                         } else {
                              cart_info.pricing = {
                                   ...cart_info.pricing,
                                   ...{
                                        ...cart_info.pricing[_id],
                                        ...data
                                   }
                              };
                         }
                         triprex_calculate_total(cart_info);
                         jQuery('.booking-form-wrap').removeClass('loading');
                         generateHTML(cart_info);
                    } else if (post_type == 'hotel') {
                         if (is_service) {
                              cart_info.services = {
                                   ...cart_info.services,
                                   ...{
                                        ...cart_info.services[_id],
                                        ...data
                                   }
                              };
                         } else {
                              cart_info.pricing = {
                                   ...cart_info.pricing,
                                   ...{
                                        ...cart_info.pricing[_id],
                                        ...data
                                   }
                              };
                         }
                         triprex_calculate_total(cart_info);
                         jQuery('.booking-form-wrap').removeClass('loading');
                         generateHTML(cart_info);
                    }
               },
               error: function (error) {
                    console.log(error);
                    jQuery('.booking-form-wrap').removeClass('loading');
               }
          });
     }

     function parseDateFromString(dateString) {
          return new Date(dateString);
     }

     function calculateDaysBetweenDates(startDate, endDate) {
          const start = parseDateFromString(startDate);
          const end = parseDateFromString(endDate);
          const difference = end - start;
          const days = difference / (1000 * 60 * 60 * 24);
          return days;
     }
}(jQuery));