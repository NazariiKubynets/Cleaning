<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= the_title() ?></title>
    <?php wp_head(); ?>
</head>

<body>
    <header class="header">
        <div class="header__container container">
            <a href="/../" class="header__logo">
                <img src="<?php the_field('header_logo', 'options'); ?>" alt="logo">
            </a>
            <div class="header__hamburger">
                <span></span>
            </div>
            <nav class="header__list">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'header-menu',
                    'container'      => false,
                ));
                ?>
            </nav>
        </div>
    </header>