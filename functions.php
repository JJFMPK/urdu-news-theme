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

// Enqueue Styles with version bump
function urdu_news_theme_scripts() {
    wp_enqueue_style('urdu-news-theme-style', get_stylesheet_uri(), array(), '1.2');
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

// Theme Customizer Section
function urdu_news_theme_customizer_sections( $wp_customize ) {
    $wp_customize->add_section( 'theme_options', array(
        'title'    => __( 'Theme Options', 'urdu-news-theme' ),
        'priority' => 160,
    ) );
}
add_action( 'customize_register', 'urdu_news_theme_customizer_sections' );

// Kirki Config (if Kirki is used)
if ( class_exists( 'Kirki' ) ) {
    Kirki::add_config( 'urdu_news_theme', array(
        'capability'    => 'edit_theme_options',
        'option_type'   => 'theme_mod',
    ));

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
}

// Custom Recent Posts With Thumbnail Widget
class Recent_Posts_Thumb_Widget extends WP_Widget {
    function __construct() {
        parent::__construct(
            'recent_posts_thumb_widget',
            __('Recent Posts with Thumbs (Custom)', 'urdu-news-theme'),
            array('description' => __('Shows recent posts with thumbnails', 'urdu-news-theme'))
        );
    }

    function widget($args, $instance) {
        echo $args['before_widget'];
        if (!empty($instance['title'])) {
            echo $args['before_title'] . apply_filters('widget_title', $instance['title']) . $args['after_title'];
        }

        $query = new WP_Query(array(
            'posts_per_page' => !empty($instance['count']) ? $instance['count'] : 5,
            'cat' => !empty($instance['cat']) ? $instance['cat'] : '',
            'post_status' => 'publish'
        ));

        echo '<ul class="recent-posts-with-thumbs">';
        while ($query->have_posts()) : $query->the_post();
            echo '<li><a href="' . get_permalink() . '">';
            if (has_post_thumbnail()) {
                echo get_the_post_thumbnail(get_the_ID(), 'thumbnail');
            }
            echo '<span class="recent-post-title">' . get_the_title() . '</span></a></li>';
        endwhile;
        echo '</ul>';
        wp_reset_postdata();

        echo $args['after_widget'];
    }

    function form($instance) {
        $title = !empty($instance['title']) ? $instance['title'] : __('Recent Posts', 'urdu-news-theme');
        $count = !empty($instance['count']) ? $instance['count'] : 5;
        $cat = !empty($instance['cat']) ? $instance['cat'] : '';
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('count'); ?>"><?php _e('Number of posts to show:'); ?></label>
            <input class="tiny-text" id="<?php echo $this->get_field_id('count'); ?>" name="<?php echo $this->get_field_name('count'); ?>" type="number" step="1" min="1" value="<?php echo esc_attr($count); ?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('cat'); ?>"><?php _e('Category ID (optional):'); ?></label>
            <input class="tiny-text" id="<?php echo $this->get_field_id('cat'); ?>" name="<?php echo $this->get_field_name('cat'); ?>" type="number" value="<?php echo esc_attr($cat); ?>">
        </p>
        <?php
    }
}
add_action('widgets_init', function() {
    register_widget('Recent_Posts_Thumb_Widget');
});
