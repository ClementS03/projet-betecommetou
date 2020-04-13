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