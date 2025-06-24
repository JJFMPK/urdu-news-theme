<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

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
                <!-- Example Ad -->
                <img src="https://via.placeholder.com/728x90?text=Your+Ad+Here" alt="Ad">
            <?php endif; ?>
.header-ad {
    flex: 1 1 100%;
    text-align: center;
    padding: 10px 0;
}

.header-ad img {
    width: auto;
    max-width: 728px;
    height: auto;
    display: inline-block;
}

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
<?php if ( is_active_sidebar('big-banner-ad') ) : ?>
    <div class="big-banner-ad">
        <?php dynamic_sidebar('big-banner-ad'); ?>
    </div>
<?php endif; ?>

    </div>
</header>
