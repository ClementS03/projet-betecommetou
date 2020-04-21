<?php
function custom_post_type() {

// Set UI labels for Custom Post Type
    $labels = array(
        'name'                => _x( 'Evénements', 'Post Type General Name','Betecommetou'),
        'singular_name'       => _x( 'Evénement', 'Post Type Singular Name','Betecommetou' ),
        'menu_name'           => __( 'Evénements','Betecommetou' ),
        'all_items'           => __( 'Tous les Evénements','Betecommetou' ),
        'view_item'           => __( 'Voir Evénement','Betecommetou' ),
        'add_new_item'        => __( 'Ajouter Evénement','Betecommetou' ),
        'add_new'             => __( 'Ajouter','Betecommetou' ),
        'edit_item'           => __( 'Modifier Evénement','Betecommetou' ),
        'update_item'         => __( 'Mettre a Jour Evénement','Betecommetou' ),
        'search_items'        => __( 'Rechercher Evénement','Betecommetou' ),
        'not_found'           => __( 'Pas D\'Evénement trouvé','Betecommetou' ),
        'not_found_in_trash'  => __( 'Pas D\'Evénement trouvé dans la corbeille','Betecommetou' ),
    );
    
// Set other options for Custom Post Type
    
    $args = array(
        'label'               => __( 'Evénements','Betecommetou'),
        'description'         => __( 'Les Evénements','Betecommetou' ),
        'labels'              => $labels,
        // Features this CPT supports in Post Editor
        'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
        // You can associate this CPT with a taxonomy or custom taxonomy. 
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'menu_icon' => 'dashicons-dashboard',
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'post',        
        'show_in_rest' => true,

    );
    
    // Registering your Custom Post Type
    register_post_type( 'Evenements', $args );

}

/* Hook into the 'init' action so that the function
* Containing our post type registration is not 
* unnecessarily executed. 
*/

add_action( 'init', 'custom_post_type', 0 );
?>