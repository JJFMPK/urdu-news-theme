<?php get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
        <section class="error-404 not-found">
            <header class="page-header">
                <h1 class="page-title"><?php _e( '404 - صفحہ نہیں ملا', 'urdu-news' ); ?></h1>
            </header>
            <div class="page-content">
                <p><?php _e( 'معذرت، آپ جس صفحے کو دیکھنا چاہتے ہیں وہ موجود نہیں۔', 'urdu-news' ); ?></p>
                <?php get_search_form(); ?>
            </div>
        </section>
    </main>
</div>

<?php get_footer(); ?>
