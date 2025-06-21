<?php get_header(); ?>

<main class="site-main container">

    <section class="category-news">
        <h2><?php single_cat_title(); ?></h2>

        <div class="posts-grid">
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                <article class="post-item">
                    <a href="<?php the_permalink(); ?>">
                        <?php if ( has_post_thumbnail() ) : ?>
                            <?php the_post_thumbnail('medium'); ?>
                        <?php endif; ?>
                        <h3><?php the_title(); ?></h3>
                    </a>
                </article>
            <?php endwhile; else : ?>
                <p>کوئی خبر نہیں ملی۔</p>
            <?php endif; ?>
        </div>

    </section>

    <?php get_sidebar(); ?>

</main>

<?php get_footer(); ?>
