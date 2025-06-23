<?php
// Urdu News Theme Setup
function urdu_news_theme_setup() {
    add_theme_support('custom-logo');
    add_theme_support('post-thumbnails');
    register_nav_menus(array(
        'main-menu' => __('Main Menu', 'urdu-news-theme')
    ));
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

// Header Ad Widget
register_sidebar(array(
    'name'          => __('Header Ad', 'urdu-news-theme'),
    'id'            => 'header-ad',
    'before_widget' => '<div class="header-widget">',
    'after_widget'  => '</div>',
    'before_title'  => '',
    'after_title'   => '',
));

// Load Kirki Framework
if ( ! class_exists( 'Kirki' ) ) {
    include_once( get_template_directory() . '/inc/kirki/kirki.php' );
}

// Add Theme Options Section
function urdu_news_theme_customizer_sections( $wp_customize ) {
    $wp_customize->add_section( 'theme_options', array(
        'title'    => __( 'Theme Options', 'urdu-news-theme' ),
        'priority' => 160,
    ) );
}
add_action( 'customize_register', 'urdu_news_theme_customizer_sections' );

// Kirki Config
Kirki::add_config( 'urdu_news_theme', array(
    'capability'    => 'edit_theme_options',
    'option_type'   => 'theme_mod',
) );

// Featured Post ID
Kirki::add_field( 'urdu_news_theme', [
    'type'     => 'number',
    'settings' => 'featured_post_id',
    'label'    => __( 'Featured Post ID', 'urdu-news-theme' ),
    'section'  => 'theme_options',
    'default'  => '',
    'priority' => 10,
] );

// First Block Category ID
Kirki::add_field( 'urdu_news_theme', [
    'type'     => 'number',
    'settings' => 'first_block_category',
    'label'    => __( 'First Block Category ID', 'urdu-news-theme' ),
    'section'  => 'theme_options',
    'default'  => '',
    'priority' => 20,
] );

// First Block Posts Count
Kirki::add_field( 'urdu_news_theme', [
    'type'     => 'number',
    'settings' => 'first_block_posts',
    'label'    => __( 'First Block Posts Count', 'urdu-news-theme' ),
    'section'  => 'theme_options',
    'default'  => 4,
    'priority' => 30,
] );

// Second Block Category ID
Kirki::add_field( 'urdu_news_theme', [
    'type'     => 'number',
    'settings' => 'second_block_category',
    'label'    => __( 'Second Block Category ID', 'urdu-news-theme' ),
    'section'  => 'theme_options',
    'default'  => '',
    'priority' => 40,
] );

// Second Block Posts Count
Kirki::add_field( 'urdu_news_theme', [
    'type'     => 'number',
    'settings' => 'second_block_posts',
    'label'    => __( 'Second Block Posts Count', 'urdu-news-theme' ),
    'section'  => 'theme_options',
    'default'  => 4,
    'priority' => 50,
] );
