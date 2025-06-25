<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<!-- Top Bar with Time & Date -->
<div class="top-bar">
    <div class="container">
        <div class="top-date-time">
            <?php
            date_default_timezone_set('Asia/Karachi');
            echo date_i18n('l, j F Y | g:i A');
            ?>
        </div>
    </div>
</div>

<!-- Breaking News Bar -->
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

        <!-- Header Ad -->
        <div class="header-ad">
            <?php if ( is_active_sidebar('header-ad') ) : ?>
                <?php dynamic_sidebar('header-ad'); ?>
            <?php else : ?>
                <!-- Placeholder -->
                <img src="https://via.placeholder.com/728x90?text=Ad+Banner" alt="Header Ad">
            <?php endif; ?>
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

    <!-- Big Banner Ad (optional) -->
    <?php if ( is_active_sidebar('big-banner-ad') ) : ?>
        <div class="container">
            <div class="big-banner-ad">
                <?php dynamic_sidebar('big-banner-ad'); ?>
            </div>
        </div>
    <?php endif; ?>
</header>
