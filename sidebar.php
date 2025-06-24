<aside class="site-sidebar">

    <!-- Sidebar Ad -->
    <div class="sidebar-ad">
        <img src="https://via.placeholder.com/300x250?text=Sidebar+Ad" alt="Sidebar Ad">
    </div>

    <!-- Main Sidebar Widgets -->
    <?php if ( is_active_sidebar( 'main-sidebar' ) ) : ?>
        <?php dynamic_sidebar( 'main-sidebar' ); ?>
    <?php endif; ?>

    <!-- Recent Posts with Thumbnails -->
    <div class="widget">
        <h3 class="widget-title">تازہ خبریں</h3>
        <ul class="recent-posts-with-thumbs">
            <?php
            $recent_posts = new WP_Query(array(
                'posts_per_page' => 5,
                'post_status'    => 'publish',
            ));
            while ( $recent_posts->have_posts() ) : $recent_posts->the_post(); ?>
                <li class="recent-post-item">
                    <a href="<?php the_permalink(); ?>">
                        <?php if ( has_post_thumbnail() ) : ?>
                            <img src="<?php echo get_the_post_thumbnail_url( get_the_ID(), 'thumbnail' ); ?>" alt="<?php the_title(); ?>">
                        <?php else : ?>
                            <img src="https://via.placeholder.com/90x90?text=No+Image" alt="<?php the_title(); ?>">
                        <?php endif; ?>
                        <span><?php the_title(); ?></span>
                    </a>
                </li>
            <?php endwhile; wp_reset_postdata(); ?>
        </ul>
    </div>

</aside>
