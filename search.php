<?php get_header(); ?>

<main id="primary" class="site-main">
    <h1 class="page-title">
        <?php printf( __( 'تلاش کے نتائج: %s', 'urdu-news' ), '<span>' . get_search_query() . '</span>' ); ?>
    </h1>

    <?php if ( have_posts() ) : ?>
        <?php while ( have_posts() ) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <h2 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                <div class="post-meta"><?php the_time('F j, Y'); ?> | <?php the_category(', '); ?></div>
                <div class="post-excerpt"><?php the_excerpt(); ?></div>
            </article>
        <?php endwhile; ?>
        <div class="pagination"><?php the_posts_pagination(); ?></div>
    <?php else : ?>
        <p><?php _e( 'کوئی نتائج نہیں ملے۔', 'urdu-news' ); ?></p>
    <?php endif; ?>

</main>

<?php get_footer(); ?>
