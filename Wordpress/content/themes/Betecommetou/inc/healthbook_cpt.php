<?php
function create_cpt() {

$labels = array(
    'name'                  => 'Carnets de santé',
    'singular_name'         => 'Carnet de santé',
    'menu_name'             => 'Carnets de santé',
    'name_admin_bar'        => 'Carnets de santé',
    'archives'              => 'Archives des Carnets de santé',
    'attributes'            => 'Attributs des Carnets de santé',
    'parent_item_colon'     => 'Element parent',
    'all_items'             => 'Tous les Carnets de santé',
    'add_new_item'          => 'Ajouter un nouveau Carnet de santé',
    'add_new'               => 'Ajouter un nouveau Carnet de santé',
    'new_item'              => 'Nouveau Carnet de santé',
    'edit_item'             => 'Editer le Carnet de santé',
    'update_item'           => 'Mettre à jour le Carnet de santé',
    'view_item'             => 'Voir le Carnet de santé',
    'view_items'            => 'Voir les Carnets de santé',
    'search_items'          => 'Rechercher les Carnets de santé',
    'not_found'             => 'Aucuns Carnet de santé trouvée',
    'not_found_in_trash'    => 'Aucuns Carnet de santé trouvée dans la corbeille',
    'featured_image'        => 'Image du Carnet de santé',
    'set_featured_image'    => 'Ajouter une image au Carnet de santé',
    'remove_featured_image' => 'Supprimer l\'image du Carnet de santé',
    'use_featured_image'    => 'Utiliser une image pour le Carnet de santé',
    'insert_into_item'      => 'Inserer dans le Carnet de santé',
    'uploaded_to_this_item' => 'Televerser dans le Carnet de santé',
    'items_list'            => 'Liste des Carnets de santé',
    'items_list_navigation' => 'Liste des Carnets de santé',
    'filter_items_list'     => 'Filtrer la liste des Carnets de santé',
);

$args = array(
    'label'               => 'Les Carnets de Santé' , 
    'description'         => 'Les Carnets de santé',
    'labels'              => $labels,
    'supports'            => [
        'title', 
        'editor', 
        'excerpt', 
        'author', 
        'thumbnail', 
        'comments', 
        'revisions', 
        'custom-fields', 
    ],
    'hierarchical'        => false,
    'public'              => true,
    'menu_position'       => 2,
    'menu_icon' => 'dashicons-book-alt',
    'has_archive'         => true,
    'exclude_from_search' => false,
    'publicly_queryable'  => true,
    'capability_type'     => 'healthbook',
    'map_meta_cap'        => true,
    'rewrite'               => [
        'slug'              => 'carnet-de-sante',
        'with_front'        => true,
    ],
    'show_in_rest'        => true,

);

register_post_type( 'healthbook', $args );        
}

add_action('init', 'create_cpt');