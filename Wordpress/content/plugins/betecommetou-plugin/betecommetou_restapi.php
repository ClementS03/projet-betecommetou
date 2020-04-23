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
        global $wp_roles;
            $wp_roles->add_cap('administrator','read_healthbooks');
            $wp_roles->add_cap('administrator','delete_healthbooks');
            $wp_roles->add_cap('administrator','delete_private_healthbooks');
            $wp_roles->add_cap('administrator','delete_published_healthbooks');
            $wp_roles->add_cap('administrator','delete_others_healthbooks');
            $wp_roles->add_cap('administrator','edit_private_healthbooks');
            $wp_roles->add_cap('administrator','edit_published_healthbooks');
            $wp_roles->add_cap('administrator','edit_others_healthbooks');
            $wp_roles->add_cap('administrator','edit_healthbooks');
            $wp_roles->add_cap('administrator','publish_healthbooks');

            $wp_roles->add_cap('subscriber','read_healthbooks');
            $wp_roles->add_cap('subscriber','delete_healthbooks');
            $wp_roles->add_cap('subscriber','delete_private_healthbooks');
            $wp_roles->add_cap('subscriber','delete_published_healthbooks');
            $wp_roles->add_cap('subscriber','edit_private_healthbooks');
            $wp_roles->add_cap('subscriber','edit_published_healthbooks');
            $wp_roles->add_cap('subscriber','edit_healthbooks');
            $wp_roles->add_cap('subscriber','publish_healthbooks');
            $wp_roles->add_cap('subscriber','read_healthbook');
            $wp_roles->add_cap('subscriber','delete_healthbook');
            $wp_roles->add_cap('subscriber','delete_private_healthbook');
            $wp_roles->add_cap('subscriber','delete_published_healthbook');
            $wp_roles->add_cap('subscriber','edit_private_healthbook');
            $wp_roles->add_cap('subscriber','edit_published_healthbook');
            $wp_roles->add_cap('subscriber','edit_healthbook');
            $wp_roles->add_cap('subscriber','publish_healthbook');
    }

add_action('init', 'addCap');

class BetecommetouAPI {

    public function __construct() {

        add_action('rest_api_init', [$this, 'userMetaField']);
        add_action('rest_api_init', [$this, 'userAdressField']);
        add_action('rest_api_init', [$this, 'userPhoneField']);
        add_action('rest_api_init', [$this, 'metaFields']);
        add_action('rest_api_init', [$this, 'thumbnailField']);
        add_action('rest_api_init', [$this, 'postAnimalName']);
        add_action('rest_api_init', [$this, 'postAnimalAge']);
        add_action('rest_api_init', [$this, 'postAnimalType']);
        add_action('rest_api_init', [$this, 'postAnimalSex']);
        add_action('rest_api_init', [$this, 'postAnimalAssurance']);
        add_action('rest_api_init', [$this, 'postAnimalRace']);
        add_action('rest_api_init', [$this, 'postAnimalRobe']);
        add_action('rest_api_init', [$this, 'postAnimalPedigree']);
        add_action('rest_api_init', [$this, 'postAnimalTatouage']);
        add_action('rest_api_init', [$this, 'postAnimalIdentification']);

    }
    public function userMetaField() {
        register_rest_field(
            "user",
            'meta',
            [
                'get_callback' => [$this, 'getUserMetaFields'],
                'update_callback' => null,
                'schema' => null
            ]
        );
    }

    public function getUserMetaFields ($object) {
        $array_return = [];
        $object_id = $object['id'];
        $all_meta = get_user_meta($object_id);
        foreach($all_meta as $meta_name => $meta_value) {
            if(substr($meta_name,0,1) != '_') {
                $array_return[$meta_name] = $meta_value[0];
            }
        }
        return $array_return;
    }

    public function userAdressField() {
        register_rest_field(
            'user',
            'adress',
            [
                'get_callback' => null,
                'update_callback' => function ($value, $object, $field_name) {
                    update_user_meta($object->ID, 'adress', $value);
                },
                'schema' => null
            ]
        );
    }
    public function userPhoneField() {
        register_rest_field(
            'user',
            'phone',
            [
                'get_callback' => null,
                'update_callback' => function ($value, $object, $field_name) {
                    update_user_meta($object->ID, 'phone', $value);
                },
                'schema' => null
            ]
        );
    }
    public function metaFields() {

        register_rest_field(
            'healthbook',
            'meta',
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

    public function postAnimalSex() {
        register_rest_field(
            'healthbook',
            'sexe',
            [
                'get_callback' => null,
                'update_callback' => function ($value, $object, $field_name) {
                    update_post_meta($object->ID, 'sexe', $value);
                },
                'schema' => null
            ]
        );
    }
    
    public function postAnimalAssurance() {
        register_rest_field(
        'healthbook',
        'assurance',
            [
                'get_callback' => null,
                'update_callback' => function ($value, $object, $field_name) {
                    update_post_meta($object->ID, 'assurance', $value);
                },
                'schema' => null
            ]
            );
    }
    public function postAnimalRace() {
        register_rest_field(
            'healthbook',
            'race',
            [
                'get_callback' => null,
                'update_callback' => function ($value, $object, $field_name) {
                    update_post_meta($object->ID, 'race', $value);
                },
                'schema' => null
            ]
        );
    }

    public function postAnimalRobe() {
        register_rest_field(
            'healthbook',
            'robe',
            [
                'get_callback' => null,
                'update_callback' => function ($value, $object, $field_name) {
                    update_post_meta($object->ID, 'robe', $value);
                },
                'schema' => null
            ]
        );
    }
    
    public function postAnimalPedigree() {
        register_rest_field(
            'healthbook',
            'pedigree',
            [
                'get_callback' => null,
                'update_callback' => function ($value, $object, $field_name) {
                    update_post_meta($object->ID, 'pedigree', $value);
                },
                'schema' => null
            ]
        );
    }
    public function postAnimalTatouage() {
        register_rest_field(
            'healthbook',
            'numero_de_tatouage',
            [
                'get_callback' => null,
                'update_callback' => function ($value, $object, $field_name) {
                    update_post_meta($object->ID, 'numero_de_tatouage', $value);
                },
                'schema' => null
            ]
        );
    }
    public function postAnimalIdentification() {
        register_rest_field(
            'healthbook',
            'numero_didentification_electronique',
            [
                'get_callback' => null,
                'update_callback' => function ($value, $object, $field_name) {
                    update_post_meta($object->ID, 'numero_didentification_electronique', $value);
                },
                'schema' => null
            ]
        );
    }

}

$betecommetou_restAPI = new BetecommetouAPI();


