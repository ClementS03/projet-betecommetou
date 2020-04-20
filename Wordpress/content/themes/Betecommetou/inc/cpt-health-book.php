<?php
function custom_post_type_health_book() {

// Set UI labels for Custom Post Type
    $labels = array(
        'name'                => _x( 'Carnets de santé', 'Post Type General Name','Betecommetou'),
        'singular_name'       => _x( 'Carnet de santé', 'Post Type Singular Name','Betecommetou' ),
        'menu_name'           => __( 'Carnet de santé','Betecommetou' ),
        'all_items'           => __( 'Tous les Carnets de santé','Betecommetou' ),
        'view_item'           => __( 'Voir le Carnet de santé','Betecommetou' ),
        'add_new_item'        => __( 'Ajouter Carnet de santé','Betecommetou' ),
        'add_new'             => __( 'Ajouter','Betecommetou' ),
        'edit_item'           => __( 'Modifier Carnet de santé','Betecommetou' ),
        'update_item'         => __( 'Mettre a Jour Carnet de santé','Betecommetou' ),
        'search_items'        => __( 'Rechercher Carnet de santé','Betecommetou' ),
        'not_found'           => __( 'Pas de Carnet de santé trouvé','Betecommetou' ),
        'not_found_in_trash'  => __( 'Pas de Carnet de santé trouvé dans la corbeille','Betecommetou' ),
    );
    
// Set other options for Custom Post Type
    
    $args = array(
        'label'               => __( 'Carnet de santé','Betecommetou'),
        'description'         => __( 'Les Carnets de santé','Betecommetou' ),
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
        'menu_icon' => 'dashicons-book-alt',
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'post',
        'show_in_rest' => true,

    );
    
    // Registering your Custom Post Type
    register_post_type( 'Carnet de santé', $args );

}

/* Hook into the 'init' action so that the function
* Containing our post type registration is not 
* unnecessarily executed. 
*/

add_action( 'init', 'custom_post_type_health_book', 0 );
?>