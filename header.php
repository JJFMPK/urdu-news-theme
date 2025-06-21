<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<!-- Breaking News Ticker -->
<div class="breaking-news-bar">
    <div class="container">
        <?php echo do_shortcode('[ditty_news_ticker id="123"]'); ?>
    </div>
</div>

<!-- Header -->
<header class="site-header">
    <div class="container header-top">
        <div class="site-branding">
            <?php
            if ( has_custom_logo() ) {
                the_custom_logo();
            } else {
                echo '<h1>' . get_bloginfo( 'name' ) . '</h1>';
            }
            ?>
        </div>

        <div class="header-ad">
            <img src="https://via.placeholder.com/728x90?text=Header+Ad+728x90" alt="Header Ad">
        </div>
    </div>

    <!-- Navigation -->
    <nav class="main-navigation">
        <div class="container">
            <?php
                wp_nav_menu(array(
                    'theme_location' => 'main-menu',
                    'container' => false,
                    'menu_class' => 'menu'
                ));
            ?>
        </div>
    </nav>

    <!-- Big Banner -->
    <div class="container big-banner-ad">
        <img src="https://via.placeholder.com/970x250?text=Big+Banner+Ad" alt="Big Banner Ad">
    </div>
</header>
