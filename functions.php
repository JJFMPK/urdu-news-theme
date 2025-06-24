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

// Big Banner Ad Widget
register_sidebar(array(
    'name'          => __('Big Banner Ad', 'urdu-news-theme'),
    'id'            => 'big-banner-ad',
    'before_widget' => '<div class="big-banner-ad">',
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
));

// Featured Post ID (optional field — can be used later)
Kirki::add_field( 'urdu_news_theme', [
    'type'     => 'number',
    'settings' => 'featured_post_id',
    'label'    => __( 'Featured Post ID', 'urdu-news-theme' ),
    'section'  => 'theme_options',
    'default'  => '',
    'priority' => 10,
]);

// Main Section Category (for front-page main block)
Kirki::add_field( 'urdu_news_theme', [
    'type'        => 'select',
    'settings'    => 'main_section_category',
    'label'       => esc_html__( 'Main Section Category', 'urdu-news-theme' ),
    'section'     => 'theme_options',
    'priority'    => 5,
    'choices'     => wp_list_pluck( get_categories( array( 'hide_empty' => false ) ), 'name', 'term_id' ),
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
// Register Recent Posts with Thumbs Widget
class Urdu_News_Recent_Posts_Thumbs extends WP_Widget {

    function __construct() {
        parent::__construct(
            'urdu_news_recent_posts_thumbs',
            __('Recent Posts with Thumbs (Custom)', 'urdu-news-theme'),
            array( 'description' => __( 'Display recent posts with thumbnails and category filter.', 'urdu-news-theme' ), )
        );
    }

    public function widget( $args, $instance ) {
        $title = apply_filters( 'widget_title', $instance['title'] );
        $category = ! empty( $instance['category'] ) ? $instance['category'] : '';
        $number = ! empty( $instance['number'] ) ? $instance['number'] : 5;

        echo $args['before_widget'];
        if ( ! empty( $title ) ) {
            echo $args['before_title'] . $title . $args['after_title'];
        }

        $query_args = array(
            'posts_per_page' => $number,
            'post_status'    => 'publish',
            'cat'            => $category,
        );

        $recent_posts = new WP_Query( $query_args );

        if ( $recent_posts->have_posts() ) {
            echo '<ul class="recent-posts-with-thumbs">';
            while ( $recent_posts->have_posts() ) : $recent_posts->the_post();
                echo '<li>';
                if ( has_post_thumbnail() ) {
                    echo '<a href="' . get_permalink() . '">';
                    echo get_the_post_thumbnail( get_the_ID(), 'thumbnail', array( 'style' => 'width:90px; height:90px; object-fit:cover; margin-left:10px; border:1px solid #ddd;' ) );
                    echo '</a>';
                }
                echo '<div class="recent-post-title">';
                echo '<a href="' . get_permalink() . '">' . get_the_title() . '</a>';
                echo '</div>';
                echo '</li>';
            endwhile;
            echo '</ul>';
            wp_reset_postdata();
        }

        echo $args['after_widget'];
    }

    public function form( $instance ) {
        $title = ! empty( $instance['title'] ) ? $instance['title'] : __( 'Recent Posts', 'urdu-news-theme' );
        $category = ! empty( $instance['category'] ) ? $instance['category'] : '';
        $number = ! empty( $instance['number'] ) ? $instance['number'] : 5;

        // Title field
        ?>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php _e( 'Title:' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"
                   name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text"
                   value="<?php echo esc_attr( $title ); ?>">
        </p>

        <!-- Category Dropdown -->
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'category' ) ); ?>"><?php _e( 'Category:' ); ?></label>
            <?php
            wp_dropdown_categories( array(
                'show_option_all' => 'All Categories',
                'name'            => esc_attr( $this->get_field_name( 'category' ) ),
                'selected'        => $category,
                'class'           => 'widefat',
            ) );
            ?>
        </p>

        <!-- Number of posts -->
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>"><?php _e( 'Number of posts:' ); ?></label>
            <input class="tiny-text" id="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>"
                   name="<?php echo esc_attr( $this->get_field_name( 'number' ) ); ?>" type="number" step="1" min="1"
                   value="<?php echo esc_attr( $number ); ?>" size="3">
        </p>
        <?php
    }

    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = sanitize_text_field( $new_instance['title'] );
        $instance['category'] = sanitize_text_field( $new_instance['category'] );
        $instance['number'] = absint( $new_instance['number'] );

        return $instance;
    }
}

// Register widget
function register_urdu_news_recent_posts_thumbs() {
    register_widget( 'Urdu_News_Recent_Posts_Thumbs' );
}
add_action( 'widgets_init', 'register_urdu_news_recent_posts_thumbs' );
