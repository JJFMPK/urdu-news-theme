<?php get_header(); ?>

<main class="site-main container">

    <!-- BBC Style Main Block: 1 Big + 4 Small -->
    <?php
    $main_block_query = new WP_Query(array(
        'posts_per_page' => 5, // 1 big + 4 small
        'cat' => 1 // Change to your main category ID (eg. تازہ ترین)
    ));
    if ( $main_block_query->have_posts() ) :
        $post_count = 0;
    ?>
    <section class="main-bbc-block">
        <div class="main-bbc-grid">
            <?php while ( $main_block_query->have_posts() ) : $main_block_query->the_post(); $post_count++; ?>
                <?php if ( $post_count == 1 ) : ?>
                    <!-- Big Post -->
                    <article class="main-big-post">
                        <a href="<?php the_permalink(); ?>">
                            <?php the_post_thumbnail('large'); ?>
                            <h2><?php the_title(); ?></h2>
                        </a>
                    </article>
                <?php else : ?>
                    <!-- Small Post -->
                    <article class="main-small-post">
                        <a href="<?php the_permalink(); ?>">
                            <?php the_post_thumbnail('thumbnail'); ?>
                            <h3><?php the_title(); ?></h3>
                        </a>
                    </article>
                <?php endif; ?>
            <?php endwhile; wp_reset_postdata(); ?>
        </div>
    </section>
    <?php endif; ?>

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
