 <?php
function _catch_empty_user( $username, $pwd ) {
    if (empty($pwd)&&empty($username)) {
        wp_safe_redirect(home_url().'/login/?champs=vides');
        exit();
    }  if ( empty( $username )) {
        wp_safe_redirect(home_url() . '/login/?utilisateur=vide' );
        exit();
    }
    if (empty($pwd)) {
        wp_safe_redirect(home_url().'/login/?password=vide');
        exit();
    }
}
add_action( 'wp_authenticate', '_catch_empty_user', 1, 2 );
?>

<?php
function pippin_login_fail( $username ) {
    $referrer = $_SERVER['HTTP_REFERER'];  // where did the post submission come from?
    // if there's a valid referrer, and it's not the default log-in screen
    if ( !empty($referrer) && !strstr($referrer,'wp-login') && !strstr($referrer,'wp-admin') ) {
        wp_redirect(home_url() . '/login/?login=echec' );  // let's append some information (login=failed) to the URL for the theme to use
        exit;
    }
}
add_action( 'wp_login_failed', 'pippin_login_fail' );
?> 