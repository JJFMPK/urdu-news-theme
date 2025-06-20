<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<header class="site-header">
    <div class="container">
        <h1><?php bloginfo('name'); ?></h1>
        <nav class="main-navigation">
            <?php
                wp_nav_menu(array(
                    'theme_location' => 'main-menu',
                    'container' => false
                ));
            ?>
        </nav>
    </div>
</header>
