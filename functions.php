<?php

function urdu_news_theme_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo');
    add_theme_support('automatic-feed-links');
    add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));
    add_theme_support('widgets');
    add_theme_support('elementor');
    add_theme_support('rtl-language-support');

    // Register menu
    register_nav_menus(array(
        'main-menu' => __('Main Menu', 'urdu-news')
    ));
}
add_action('after_setup_theme', 'urdu_news_theme_setup');

function urdu_news_theme_scripts() {
    wp_enqueue_style('urdu-news-style', get_stylesheet_uri());
    if (is_rtl()) {
        wp_enqueue_style('urdu-news-rtl', get_template_directory_uri() . '/rtl.css', array(), '1.0');
    }
    wp_enqueue_script('urdu-news-js', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), '1.0', true);
}
add_action('wp_enqueue_scripts', 'urdu_news_theme_scripts');
