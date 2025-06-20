<aside class="site-sidebar">
    <div class="sidebar-ad">
        <img src="https://via.placeholder.com/300x250?text=Sidebar+Ad" alt="Sidebar Ad">
    </div>

    <?php if ( is_active_sidebar( 'main-sidebar' ) ) : ?>
        <?php dynamic_sidebar( 'main-sidebar' ); ?>
    <?php endif; ?>
</aside>
