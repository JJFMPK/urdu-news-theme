<?php
/**
 * Urdu News Theme functions and definitions
 */

// Urdu News Theme Setup
function urdu_news_theme_setup() {
    // Add support for custom logo
    add_theme_support('custom-logo');

    // Add support for post thumbnails
    add_theme_support('post-thumbnails');

    // Register main menu
    register_nav_menus(array(
        'main-menu' => __('Main Menu', 'urdu-news-theme')
    ));

    // Register sidebar
    register_sidebar(array(
        'name'          => __('Main Sidebar', 'urdu-news-theme'),
        'id'            => 'main-sidebar',
        'before_widget' => '<div class="widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
}
add_action('after_setup_theme', 'urdu_news_theme_setup');

// Enqueue Styles
function urdu_news_theme_scripts() {
    wp_enqueue_style('urdu-news-theme-style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'urdu_news_theme_scripts');
