<?php

function wpdocs_custom_excerpt_length( $length ) {
    return 20;
}
add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );

// function wpdocs_excerpt_more( $more ) {
//     if ( ! is_single() ) {
//         $more = sprintf( '<a class="lire-plus" href="%1$s">%2$s</a>',
//             get_permalink( get_the_ID() ),
//             __( ' En savoir plus', 'textdomain' )
//         );
//     }
 
//     return $more;
// }
// add_filter( 'excerpt_more', 'wpdocs_excerpt_more' );
// ?>