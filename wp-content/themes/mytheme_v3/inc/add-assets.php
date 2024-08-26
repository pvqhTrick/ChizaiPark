<?php
/**
 *  SETUP ASSETS
 */


// ADD ASSETS HEAD
function add_theme_assets_for_head() {
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Maven+Pro:wght@500;700&family=Noto+Sans+JP:wght@400;500;700;900&display=swap', array(), null);
    wp_enqueue_style('main-common-css', get_template_directory_uri() . '/assets/css/common.css');

    if ( is_home() || is_front_page() ) {
        wp_enqueue_style('index-style', get_template_directory_uri() . '/assets/css/index.css', array('main-common-css'));
    } elseif ( is_single() ) {
        if (is_singular('joseikin')) {
            wp_enqueue_style('single-style', get_template_directory_uri() . '/assets/css/joseikin-detail.css', array('main-common-css'));
        } elseif (is_singular('kigyou')) {
            wp_enqueue_style('single-style', get_template_directory_uri() . '/assets/css/kigyou-detail.css', array('main-common-css'));
        } elseif (is_singular('seminar')) {
            wp_enqueue_style('single-style', get_template_directory_uri() . '/assets/css/seminar-detail.css', array('main-common-css'));
        } elseif (is_singular('news')) {
            wp_enqueue_style('single-style', get_template_directory_uri() . '/assets/css/joseikin-detail.css', array('main-common-css'));
        } elseif (is_singular('venture-capital')) {
            wp_enqueue_style('single-style', get_template_directory_uri() . '/assets/css/venture-capital-detail.css', array('main-common-css'));
        } elseif (is_singular('chizai')) {
            wp_enqueue_style('single-style', get_template_directory_uri() . '/assets/css/chizai-detail.css', array('main-common-css'));
        } 
    } elseif ( is_post_type_archive('joseikin') ) {
        wp_enqueue_style('list-style', get_template_directory_uri() . '/assets/css/joseikin.css');
    } elseif ( is_post_type_archive('chizai') ) {
        wp_enqueue_style('list-style', get_template_directory_uri() . '/assets/css/chizai.css');
    } elseif ( is_post_type_archive('seminar') ) {
        wp_enqueue_style('list-style', get_template_directory_uri() . '/assets/css/seminar.css');
    } elseif ( is_post_type_archive('kigyou') ) {
        wp_enqueue_style('list-style', get_template_directory_uri() . '/assets/css/kigyou.css');
    } elseif ( is_post_type_archive('news') ) {
        wp_enqueue_style('list-style', get_template_directory_uri() . '/assets/css/chizai-news.css');
    } elseif ( is_post_type_archive('venture-capital') ) {
        wp_enqueue_style('list-style', get_template_directory_uri() . '/assets/css/venture-capital.css');
    } elseif ( is_page('company') ) {
        wp_enqueue_style('list-style', get_template_directory_uri() . '/assets/css/company.css');
    } elseif ( is_page('contact') || is_page('thank') || is_page('finish') ) {
        wp_enqueue_style('contact-style', get_template_directory_uri() . '/assets/css/contact.css');
        wp_enqueue_script('custommscrollbar', get_template_directory_uri() .'/assets/libs/mCustomScrollbar/jquery.mCustomScrollbar.concat.min.js',array('contact-style') );
    }
}
add_action('wp_enqueue_scripts', 'add_theme_assets_for_head');

// ADD ASSETS FOOT
function add_theme_assets_for_footer() {
    wp_enqueue_script('jquery-ajax', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js', array(), null, true);
    wp_enqueue_script('jquery-min', get_template_directory_uri() . "/assets/js/jquery-1.11.0.min.js", array('jquery'), null, true);
    wp_enqueue_script('mainjs', get_template_directory_uri() . "/assets/js/script.js", array('jquery-min'), '1.0', true);
}
add_action('wp_footer', 'add_theme_assets_for_footer', 50);