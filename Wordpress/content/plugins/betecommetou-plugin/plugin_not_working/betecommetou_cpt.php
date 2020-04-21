<?php

// class Health_Book_cpt {

//     public function construct__()
//     {
//         add_action('init', [$this,'create_cpt']);

//     }

//     function create_cpt() {

//         $labels = array(
//             'name'                => _x( 'Carnets de santé', 'Post Type General Name','Betecommetou'),
//             'singular_name'       => _x( 'Carnet de santé', 'Post Type Singular Name','Betecommetou' ),
//             'menu_name'           => __( 'Carnet de santé','Betecommetou' ),
//             'all_items'           => __( 'Tous les Carnets de santé','Betecommetou' ),
//             'view_item'           => __( 'Voir le Carnet de santé','Betecommetou' ),
//             'add_new_item'        => __( 'Ajouter Carnet de santé','Betecommetou' ),
//             'add_new'             => __( 'Ajouter','Betecommetou' ),
//             'edit_item'           => __( 'Modifier Carnet de santé','Betecommetou' ),
//             'update_item'         => __( 'Mettre a Jour Carnet de santé','Betecommetou' ),
//             'search_items'        => __( 'Rechercher Carnet de santé','Betecommetou' ),
//             'not_found'           => __( 'Pas de Carnet de santé trouvé','Betecommetou' ),
//             'not_found_in_trash'  => __( 'Pas de Carnet de santé trouvé dans la corbeille','Betecommetou' ),
//         );
            
//             $args = array(
//                 'label'               => 'Les Carnets de Santé' , 
//                 'description'         => 'Les Carnets de sante',
//                 'labels'              => $labels,
//                 'supports'            => [
//                     'title', 
//                     'editor', 
//                     'excerpt', 
//                     'author', 
//                     'thumbnail', 
//                     'comments', 
//                     'revisions', 
//                     'custom-fields', 
//                 ],
//                 'hierarchical'        => false,
//                 'public'              => true,
//                 'menu_position'       => 2,
//                 'menu_icon' => 'dashicons-book-alt',
//                 'has_archive'         => true,
//                 'exclude_from_search' => false,
//                 'publicly_queryable'  => true,
//                 'capability_type'     => 'post',
//                 'show_in_rest'        => true,
        
//             );

//         register_post_type( 'healthbook', $args );        
//     }
//     public function activation()
//     {
//         $this->create_cpt();

//         flush_rewrite_rules();
//     }

//     public function deactivation()
//     {
//         flush_rewrite_rules();
//     }
// }
