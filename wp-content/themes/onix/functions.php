<?php

/**
 * Autoloads all PHP files in the functions/ folder.
 */
foreach (glob(__DIR__ . '/functions/*.php') as $filename) {
    include_once $filename;
}

if (function_exists('acf_add_options_page')) {

    acf_add_options_page(array(
        'page_title' => 'Basic settings',
        'menu_title' => 'Theme settings',
        'menu_slug' => 'theme-general-settings',
        'capability' => 'edit_posts',
        'redirect' => false
    ));
}

function register_my_menus()
{
    register_nav_menus(
        array(
            'header-menu'    => __('Header menu'),
            'footer-menu' => __('Footer menu'),
        )
    );
}
add_action('init', 'register_my_menus');

add_filter('navigation_markup_template', 'my_navigation_template', 10, 2);
function my_navigation_template($template, $class)
{
    return '
    <nav class="navigation " role="navigation">
        <div class="nav-links blog__pagination">%3$s</div>
    </nav>
    ';
}

function custom_excerpt_length($length)
{
    return 15;
}
add_filter('excerpt_length', 'custom_excerpt_length', 999);

function custom_excerpt_more($more)
{
    return '...';
}
add_filter('excerpt_more', 'custom_excerpt_more');

add_filter('wpcf7_form_autocomplete', function ($autocomplete) {
    $autocomplete = 'off';
    return $autocomplete;
}, 10, 1);



add_filter('wpcf7_validate_text*', 'custom_name_validation_filter', 20, 2);

function custom_name_validation_filter($result, $tag)
{
    $fields_to_check = array('text-727', 'your-name'); // Масив ідентифікаторів полів, які потрібно перевірити

    if (in_array($tag->name, $fields_to_check)) { // Перевіряємо, чи ідентифікатор поля знаходиться у масиві
        $your_name = isset($_POST[$tag->name]) ? trim($_POST[$tag->name]) : '';

        if (preg_match('/\d/', $your_name)) {
            $result->invalidate($tag, "
            This field cannot contain numbers.");
        }
    }

    return $result;
}

function custom_breadcrumbs()
{
    echo '<div class="breadcrumbs">
            <div class="breadcrumbs__container container">
                <ul class="breadcrumb list-unstyled">';
    if (is_front_page()) {
        echo get_the_title();
    } else {
        echo '<li><a href="' . home_url() . '">Home</a>&nbsp;</li>';
        if (is_single()) {
            echo '<li><a href="/blog">Blog</a>&nbsp;</li>';
        } 
        echo '<li>' . get_the_title() . '</li>';
    }
    echo '</ul> </div> </div>';
}


