<?php get_header(); ?>

<main class="site-main container">

    <!-- Featured Post -->
    <?php
    $featured_post_id = get_field('featured_post_id', 'option');
    if ( $featured_post_id ) :
        $featured_post = new WP_Query(array(
            'p' => $featured_post_id
        ));
        if ( $featured_post->have_posts() ) : while ( $featured_post->have_posts() ) : $featured_post->the_post(); ?>
            <article class="featured-big-post">
                <?php the_post_thumbnail('large'); ?>
                <h1><?php the_title(); ?></h1>
            </article>
        <?php endwhile; wp_reset_postdata(); endif;
    endif;
    ?>

    <!-- First Block -->
    <?php
    $first_cat_id = get_field('first_block_category', 'option');
    $first_posts = get_field('first_block_posts', 'option');
    ?>
    <?php if ( $first_cat_id ) : ?>
    <section class="category-news">
        <h2><?php echo get_cat_name($first_cat_id); ?></h2>
        <div class="posts-grid">
            <?php
            $block_query = new WP_Query(array(
                'posts_per_page' => $first_posts,
                'cat' => $first_cat_id
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
    <?php endif; ?>

    <!-- Second Block -->
    <?php
    $second_cat_id = get_field('second_block_category', 'option');
    $second_posts = get_field('second_block_posts', 'option');
    ?>
    <?php if ( $second_cat_id ) : ?>
    <section class="category-news">
        <h2><?php echo get_cat_name($second_cat_id); ?></h2>
        <div class="posts-grid">
            <?php
            $block_query2 = new WP_Query(array(
                'posts_per_page' => $second_posts,
                'cat' => $second_cat_id
            ));
            if ( $block_query2->have_posts() ) :
                while ( $block_query2->have_posts() ) : $block_query2->the_post(); ?>
                    <article class="post-item">
                        <a href="<?php the_permalink(); ?>">
                            <?php the_post_thumbnail('medium'); ?>
                            <h3><?php the_title(); ?></h3>
                        </a>
                    </article>
            <?php endwhile; wp_reset_postdata(); endif; ?>
        </div>
    </section>
    <?php endif; ?>

</main>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
