<?php get_header(); ?>
<main class="site-main container">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <h1 class="post-title"><?php the_title(); ?></h1>
            <div class="post-meta"><?php the_time('F j, Y'); ?> | <?php the_category(', '); ?></div>
            <div class="post-content"><?php the_content(); ?></div>
        </article>
    <?php endwhile; endif; ?>
</main>
<?php get_footer(); ?>
