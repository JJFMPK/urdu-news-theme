<?php get_header(); ?>
<main class="site-main container">
    <h1 class="archive-title"><?php the_archive_title(); ?></h1>
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <h2 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            <div class="post-meta"><?php the_time('F j, Y'); ?> | <?php the_category(', '); ?></div>
            <div class="post-excerpt"><?php the_excerpt(); ?></div>
        </article>
    <?php endwhile; ?>
    <div class="pagination"><?php the_posts_pagination(); ?></div>
    <?php endif; ?>
</main>
<?php get_footer(); ?>
