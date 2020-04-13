<?php
if (!function_exists('betecommetou_enqueue')) {
    
    function betecommetou_enqueue() {        
        wp_enqueue_style(
            'main-style', 
            get_theme_file_uri('public/css/style.css'),
            [],
            '20201304',
            'all'
        );
        
        wp_enqueue_script(
            'app',
            get_theme_file_uri('public/js/app.js'),
            [],
            '20201304',
            true
        );
    }
}
add_action('wp_enqueue_scripts', 'betecommetou_enqueue');

?>