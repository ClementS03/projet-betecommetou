<?php
 //Redirection if not logged    
if (!function_exists('redirect_if_not_logged')) {

    function redirect_if_not_logged () {

            if (!is_user_logged_in() && is_front_page() || is_single() || 
            is_archive() || is_page(['inscription','login','contact', 'lequipe', 'mentions-legales'])) {

            } elseif (is_user_logged_in()) {

            }  else {
                wp_safe_redirect(home_url() . '/login');
                    exit(); 
            }
        
    }
}
add_action('template_redirect', 'redirect_if_not_logged');

 //Redirection on home page if user logged
function redirect_from_login_if_user_is_logged() {
    if(is_page(['inscription','login']) && is_user_logged_in()) {
        if (!is_front_page()) {
            wp_safe_redirect(home_url());
        }
    }
}
add_action('template_redirect', 'redirect_from_login_if_user_is_logged');

function redirectFromnewsletter($redirect) {
    if ($redirect) {
        wp_safe_redirect(home_url());
        exit;
    }
    
}
add_action('template_redirect', 'redirectFromnewsletter')

?> 