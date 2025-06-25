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
    wp_enqueue_style('urdu-news-theme-style', get_stylesheet_uri(), array(), '1.3');
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

// Big Banner Ad Widget
register_sidebar(array(
    'name'          => __('Big Banner Ad', 'urdu-news-theme'),
    'id'            => 'big-banner-ad',
    'before_widget' => '<div class="big-banner-ad">',
    'after_widget'  => '</div>',
    'before_title'  => '',
    'after_title'   => '',
));

// Sidebar Ad Widget
register_sidebar(array(
    'name'          => __('Sidebar Ad', 'urdu-news-theme'),
    'id'            => 'sidebar-ad',
    'before_widget' => '<div class="sidebar-ad-widget">',
    'after_widget'  => '</div>',
    'before_title'  => '',
    'after_title'   => '',
));

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

// Main Grid Category ID (for BBC Grid)
Kirki::add_field( 'urdu_news_theme', [
    'type'     => 'number',
    'settings' => 'main_grid_category_id',
    'label'    => __( 'Main Grid Category ID', 'urdu-news-theme' ),
    'section'  => 'theme_options',
    'default'  => 1,
    'priority' => 5,
]);

// Repeater field for Category Sections
Kirki::add_field( 'urdu_news_theme', [
    'type'        => 'repeater',
    'label'       => esc_html__( 'Category Sections', 'urdu-news-theme' ),
    'section'     => 'theme_options',
    'priority'    => 20,
    'row_label'   => [
        'type'  => 'text',
        'value' => esc_html__( 'Category Section', 'urdu-news-theme' ),
    ],
    'settings'    => 'category_sections',
    'fields'      => [
        'section_name' => [
            'type'    => 'text',
            'label'   => esc_html__( 'Section Name', 'urdu-news-theme' ),
            'default' => '',
        ],
        'category_id' => [
            'type'    => 'number',
            'label'   => esc_html__( 'Category ID', 'urdu-news-theme' ),
            'default' => '',
        ],
        'posts_count' => [
            'type'    => 'number',
            'label'   => esc_html__( 'Posts Count', 'urdu-news-theme' ),
            'default' => 5,
        ],
    ],
]);
