<?php
if (!function_exists('betecommetou_setup')) {
    
    function betecommetou_setup() {
        add_theme_support('title-tag');        
        add_theme_support('post-thumbnails');

        register_nav_menus ([
            'menu_burger_header' => ('menu de navigation de la version mobile , betecommetou'),
            'menu_header' => ('menu de navigation de la version desktop, betecommetou'),
        ]);
    }
}
    add_action('after_setup_theme', 'betecommetou_setup');


// For don't show admin bar
function remove_admin_bar() {
    if (!current_user_can('edit_posts') && !is_admin()) {
        show_admin_bar(false);
    }
}
add_action('after_setup_theme', 'remove_admin_bar');

