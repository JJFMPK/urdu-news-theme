<?php get_header(); ?>

<main class="site-main container">

    <article class="single-post">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

            <header class="single-header">
                <h1 class="single-title"><?php the_title(); ?></h1>

                <?php if ( has_post_thumbnail() ) : ?>
                    <div class="single-featured-image">
                        <?php the_post_thumbnail('large'); ?>
                    </div>
                <?php endif; ?>
            </header>

            <div class="single-content">
                <?php the_content(); ?>
            </div>

        <?php endwhile; endif; ?>
    </article>

    <?php get_sidebar(); ?>

</main>

<?php get_footer(); ?>

}
