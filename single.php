<?php get_header(); ?>

<main class="site-main container">

    <article class="single-post">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

            <header class="single-header">
                <h1 class="single-title"><?php the_title(); ?></h1>

                <div class="single-meta">
                    <span class="post-date"><?php echo get_the_date(); ?></span>
                    <span class="post-author"><?php the_author(); ?></span>
                </div>

                <?php if ( has_post_thumbnail() ) : ?>
                    <div class="single-featured-image">
                        <?php the_post_thumbnail('large'); ?>
                    </div>
                <?php else : ?>
                    <div class="single-featured-image">
                        <img src="https://via.placeholder.com/600x400?text=No+Image" alt="<?php the_title(); ?>">
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
