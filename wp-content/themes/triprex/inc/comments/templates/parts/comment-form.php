<div class="inquiry-form mt-50">
    <?php
    // Custom comments_args here: https://codex.wordpress.org/Function_Reference/comment_form
    $commenter = wp_get_current_commenter();
    $req = get_option('require_name_email');
    $aria_req = ($req ? " aria-required='true'" : '');

    $comments_args = array(
        'title_reply'   => esc_html__('Leave a comment:', 'triprex'),
        'fields'     => apply_filters('comment_form_default_fields', array(
            'author' => '<div class="col-md-6 form-inner name"><label for="author">' . esc_html__('Your Name* :', 'triprex') . '</label><input id="author" name="author" type="text" value="' . esc_attr($commenter['comment_author'])
                . '" placeholder="' . esc_attr__('Jackson Mile', 'triprex') . '" ' . esc_html($aria_req) . '></div>',

            'email' => '<div class="col-md-6 form-inner email"><label for="author">' . esc_html__('Your Email* :', 'triprex') . '</label><input  id="email" name="email" type="email"  value="' . esc_attr($commenter['comment_author_email'])
                . '" placeholder="' . esc_attr__('example@gamil.com', 'triprex') . '" ' . esc_html($aria_req) . '></div>',

        )),
        'comment_field' => ' <div class="row"><div class="col-md-12 form-inner"><label for="author">' . esc_html__('Your Message* :', 'triprex') . '</label><textarea class=" text__area" id="comment" name="comment" cols="45" rows="5" placeholder="' . esc_attr__('Write Something...', 'triprex') . '"></textarea></div></div>',
        'class_submit' => 'primary-btn1 cmnt-btn',
        'label_submit' => esc_html__('Post Comment', 'triprex'),
        'format'       => 'xhtml'
    );

    ?>

    <?php
    comment_form($comments_args);
    ?>
</div>