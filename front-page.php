<?php get_header(); ?>

<main class="site-main container">

    <!-- Featured Post (Big) -->
    <?php
    $featured_post_id = get_theme_mod('featured_post_id');
    if ( $featured_post_id ) :
        $featured_post = new WP_Query(array(
            'p' => $featured_post_id
        ));
        if ( $featured_post->have_posts() ) : while ( $featured_post->have_posts() ) : $featured_post->the_post(); ?>
            <article class="featured-big-post" style="margin-bottom: 40px;">
                <?php the_post_thumbnail('full'); ?>
                <h1><?php the_title(); ?></h1>
            </article>
        <?php endwhile; wp_reset_postdata(); endif;
    endif;
    ?>

    <!-- Category Sections (Repeater) -->
    <?php
    $category_sections = get_theme_mod('category_sections');
    if ( ! empty( $category_sections ) ) {
        foreach ( $category_sections as $section ) {
            $cat_id = $section['category_id'];
            $posts_count = $section['posts_count'];
            $section_name = $section['section_name'];
    ?>
    <section class="category-news">
        <h2><?php echo esc_html( $section_name ); ?></h2>
        <div class="posts-grid">
            <?php
            $block_query = new WP_Query(array(
                'posts_per_page' => $posts_count,
                'cat' => $cat_id
            ));
            if ( $block_query->have_posts() ) :
                while ( $block_query->have_posts() ) : $block_query->the_post(); ?>
                    <article class="post-item">
                        <a href="<?php the_permalink(); ?>">
                            <?php the_post_thumbnail('medium'); ?>
                            <h3><?php the_title(); ?></h3>
                        </a>
                    </article>
            <?php endwhile; wp_reset_postdata(); endif; ?>
        </div>
    </section>
    <?php
        }
    }
    ?>

</main>

<?php get_footer(); ?>
