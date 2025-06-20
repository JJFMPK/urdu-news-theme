<?php get_header(); ?>
<main class="site-main container">
    <div class="content-area">
        <?php if ( have_posts() ) : ?>
            <?php while ( have_posts() ) : the_post(); ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <h2 class="post-title">
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </h2>
                    <div class="post-meta">
                        <?php the_time('F j, Y'); ?> | <?php the_category(', '); ?>
                    </div>
                    <div class="post-excerpt">
                        <?php the_excerpt(); ?>
                    </div>
                </article>
            <?php endwhile; ?>
            <div class="pagination">
                <?php the_posts_pagination(); ?>
            </div>
        <?php else : ?>
            <p><?php esc_html_e('کوئی خبر دستیاب نہیں ہے۔', 'urdu-news'); ?></p>
        <?php endif; ?>
    </div>
</main>
<?php get_footer(); ?>
