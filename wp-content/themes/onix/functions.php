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

function custom_excerpt_length( $length ) {
    return 15;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

function custom_excerpt_more( $more ) {
    return '...';
}
add_filter( 'excerpt_more', 'custom_excerpt_more' );



function custom_wpcf7_validate($result, $tags) {
    error_log("Функція-обробник хука спрацювала.");
    $tag = new WPCF7_Shortcode($tags);

    if ('text-727' == $tag->name) {
        $value = isset($_POST[$tag->name]) ? trim(wp_unslash(strtr((string) $_POST[$tag->name], "\n", " "))) : '';
        error_log("Значення поля: $value"); // Додати вивід значення поля у журнал помилок
        if (preg_match('/\d/', $value)) {
            $result->invalidate($tag, "Поле не може містити цифри.");
        }
    }

    return $result;
}
add_filter('wpcf7_validate', 'custom_wpcf7_validate', 10, 2);



