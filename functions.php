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
// Big Banner Ad Widget
register_sidebar(array(
    'name'          => __('Big Banner Ad', 'urdu-news-theme'),
    'id'            => 'big-banner-ad',
    'before_widget' => '<div class="big-banner-ad">',
    'after_widget'  => '</div>',
    'before_title'  => '',
    'after_title'   => '',
));
// Add Main Section Category Option to Customizer
Kirki::add_field( 'urdu_news_theme', [
    'type'        => 'select',
    'settings'    => 'main_section_category',
    'label'       => esc_html__( 'Main Section Category', 'urdu-news-theme' ),
    'section'     => 'theme_options',
    'priority'    => 5,
    'choices'     => wp_list_pluck( get_categories( array( 'hide_empty' => false ) ), 'name', 'term_id' ),
]);
