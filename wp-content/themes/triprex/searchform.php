<?php

/**
 * The template for displaying search forms
 *
 * @package triprex
 */
?>


<form method="get" id="searchform" action="<?php echo esc_url(home_url('/')); ?>" role="search">
    <div class="form-inner">
        <input type="text" id="s" name="s" placeholder="<?php echo esc_attr__('Search here...', 'triprex'); ?>">
        <button type="submit"><i class="bi bi-search"></i></button>
    </div>
</form>