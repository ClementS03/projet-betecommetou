<?php
/*
Plugin Name: Custom Roles
Description: Just another contact form plugin. Simple but flexible.
Author: Betecommetou
Text Domain: custom-roles
Domain Path: /languages/
Version: 1.0
*/

if ( ! defined( 'WPINC' )) { die; }



// change roles name
function change_role_name() {
    global $wp_roles;
    if ( ! isset( $wp_roles ) )
        $wp_roles = new WP_Roles();
    $wp_roles->roles['contributor']['name'] = 'Modérateur';
    $wp_roles->role_names['contributor'] = 'Modérateur'; 
    $wp_roles->roles['author']['name'] = 'Pet-sitter';
    $wp_roles->role_names['author'] = 'Pet-sitter';  
}

add_action('init', 'change_role_name');


