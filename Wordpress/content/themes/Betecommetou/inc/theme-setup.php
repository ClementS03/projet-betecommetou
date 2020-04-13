<?php
if (!function_exists('betecommetou_setup')) {
    
    function betecommetou_setup() {
        add_theme_support('title-tag');        
        add_theme_support('post-thumbnails');
    }
}
    add_action('after_setup_theme', 'betecommetou_setup');