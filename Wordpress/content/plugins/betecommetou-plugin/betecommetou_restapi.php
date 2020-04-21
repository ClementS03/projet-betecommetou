<?php
/*
Plugin Name: BeteCommeTou plugin
Description: Ajout des roles , des cpt et extension de l'API
Author: Team BeteCommeTou
Version: 2.5
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

function addCap()
    {
        $array_roles = [
            'administrator',
            'subscriber'
        ];

        foreach ($array_roles as $role_name) {

            $role = get_role($role_name);
            $role->add_cap('delete_healthbook');
            $role->add_cap('delete_private_healthbook');
            $role->add_cap('delete_published_healthbook');
            $role->add_cap('delete_others_healthbook');
            $role->add_cap('edit_private_healthbook');
            $role->add_cap('edit_published_healthbook');
            $role->add_cap('edit_others_healthbook');
            $role->add_cap('edit_healthbook');
            $role->add_cap('publish_healthbook');
        }
    }

add_action('init', 'addCap');

class BetecommetouAPI {

    public function __construct() {

        add_action('rest_api_init', [$this, 'metaFields']);
        add_action('rest_api_init', [$this, 'thumbnailField']);
        add_action('rest_api_init', [$this, 'postAnimalName']);
        add_action('rest_api_init', [$this, 'postAnimalAge']);
        add_action('rest_api_init', [$this, 'postAnimalType']);
    }
    public function metaFields() {

        register_rest_field(
            'healthbook',
            'animal_caracteristics',
            [
                'get_callback' => [$this, 'getMetaFields'],
                'update_callback' => null,
                'schema' => null
            ]
        );
    }
    public function getMetaFields ($object) {
        $array_return = [];
        $object_id = $object['id'];
        $all_meta = get_post_meta($object_id);
        foreach($all_meta as $meta_name => $meta_value) {
            if(substr($meta_name,0,1) != '_') {
                $array_return[$meta_name] = $meta_value[0];
            }
        }
        return $array_return;
    }
    public function thumbnailField()
    {
        register_rest_field(
            'healthbook',
            'thumbnail',
            [
                'get_callback' => [$this, 'getThumbnail'],
                'update_callback' => null,
                'schema' => null
            ]
        );
    }
    public function getThumbnail($object)
    {
        if (has_post_thumbnail($object['id'])) {            
            $thumbnail_details = wp_get_attachment_image_src($object['featured_media']);
            return [
                'url' => $thumbnail_details[0],
                'width' => $thumbnail_details[1],
                'height' => $thumbnail_details[2]
            ];
        }
        else {
            return false;
        }
    }
    public function postAnimalName() {
        register_rest_field(
            'healthbook',
            'nom_de_lanimal',
            [
                'get_callback' => null,
                'update_callback' => function ($value, $object, $field_name) {
                    update_post_meta($object->ID, 'nom_de_lanimal', $value);
                },
                'schema' => null
            ]
        );
    }

    public function postAnimalAge() {
        register_rest_field(
            'healthbook',
            'age_de_lanimal',
            [
                'get_callback' => null,
                'update_callback' => function ($value, $object, $field_name) {
                    update_post_meta($object->ID, 'age_de_lanimal', $value);
                },
                'schema' => null
            ]
        );
    }

    public function postAnimalType() {
        register_rest_field(
            'healthbook',
            'type',
            [
                'get_callback' => null,
                'update_callback' => function ($value, $object, $field_name) {
                    update_post_meta($object->ID, 'type', $value);
                },
                'schema' => null
            ]
        );
    }

}

$betecommetou_restAPI = new BetecommetouAPI();


