<?php
if (!function_exists('betecommetou_setup')) {
    
    function betecommetou_setup() {
        add_theme_support('title-tag');        
        add_theme_support('post-thumbnails',['post','page']);

        register_nav_menus ([
            'menu_burger_header' => ('menu de navigation de la version mobile , betecommetou'),
            'menu_header' => ('menu de navigation de la version desktop, betecommetou'),
        ]);
    }
}
    add_action('after_setup_theme', 'betecommetou_setup');


// Redirection if not logged    
if (!function_exists('redirect_if_not_logged')) {

    function redirect_if_not_logged () {

            if (!is_user_logged_in() && is_front_page() || is_single() || is_archive() || is_page('login')) {

            } elseif (is_user_logged_in()) {

            }  else {
                wp_safe_redirect(home_url() . '/login');
                    exit(); 
            }
        
    }
}
add_action('template_redirect', 'redirect_if_not_logged');

// For don't show admin bar
function remove_admin_bar() {
    if (!current_user_can('edit_posts') && !is_admin()) {
        show_admin_bar(false);
    }
}
add_action('after_setup_theme', 'remove_admin_bar');

//Redirection on home page if user logged
function redirect_from_login_if_user_is_logged() {
    if(is_page('login') && is_user_logged_in()) {
        if (!is_front_page()) {
            wp_safe_redirect(home_url());
        }
    }
}
add_action('template_redirect', 'redirect_from_login_if_user_is_logged');
