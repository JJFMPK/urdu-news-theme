<?php get_header(); ?>

<main class="site-main container">

    <!-- Featured News Grid -->
    <section class="featured-news">
        <h2>اہم خبریں</h2>
        <div class="posts-grid">
            <?php
            $featured = new WP_Query(array(
                'posts_per_page' => 6,
                'category_name' => 'featured'
            ));
            if ( $featured->have_posts() ) :
                while ( $featured->have_posts() ) : $featured->the_post(); ?>
                    <article class="post-item">
                        <a href="<?php the_permalink(); ?>">
                            <?php the_post_thumbnail('medium'); ?>
                            <h3><?php the_title(); ?></h3>
                        </a>
                    </article>
            <?php endwhile; wp_reset_postdata(); endif; ?>
        </div>
    </section>

    <!-- Politics News -->
    <section class="category-news">
        <h2>سیاست کی خبریں</h2>
        <div class="posts-grid">
            <?php
            $politics = new WP_Query(array(
                'posts_per_page' => 6,
                'category_name' => 'politics'
            ));
            if ( $politics->have_posts() ) :
                while ( $politics->have_posts() ) : $politics->the_post(); ?>
                    <article class="post-item">
                        <a href="<?php the_permalink(); ?>">
                            <?php the_post_thumbnail('medium'); ?>
                            <h3><?php the_title(); ?></h3>
                        </a>
                    </article>
            <?php endwhile; wp_reset_postdata(); endif; ?>
        </div>
    </section>

    <!-- Sports News -->
    <section class="category-news">
        <h2>کھیل کی خبریں</h2>
        <div class="posts-grid">
            <?php
            $sports = new WP_Query(array(
                'posts_per_page' => 6,
                'category_name' => 'sports'
            ));
            if ( $sports->have_posts() ) :
                while ( $sports->have_posts() ) : $sports->the_post(); ?>
                    <article class="post-item">
                        <a href="<?php the_permalink(); ?>">
                            <?php the_post_thumbnail('medium'); ?>
                            <h3><?php the_title(); ?></h3>
                        </a>
                    </article>
            <?php endwhile; wp_reset_postdata(); endif; ?>
        </div>
    </section>

</main>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
