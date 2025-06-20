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

<!-- Top Header: Logo + Ad -->
<header class="site-header">
    <div class="container header-top">
        <div class="site-branding">
            <?php
            if ( function_exists( 'the_custom_logo' ) && has_custom_logo() ) {
                the_custom_logo();
            } else {
                echo '<h1>' . get_bloginfo( 'name' ) . '</h1>';
            }
            ?>
        </div>

        <div class="header-ad">
            <!-- Place your ad code here (e.g., Google AdSense or static image) -->
            <img src="https://via.placeholder.com/728x90?text=Ad+Banner" alt="Ad Banner">
        </div>
    </div>

    <!-- Navigation Menu -->
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

    <!-- Below Nav: Big Ad space -->
    <div class="container big-banner-ad">
        <img src="https://via.placeholder.com/970x250?text=Big+Ad+Banner" alt="Big Ad Banner">
    </div>
</header>
