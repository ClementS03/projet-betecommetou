<?php
/*
Plugin Name: BeteCommeTou newsletter
Description: La newsletter de Betecommetou
Author: Team BeteCommeTou
Version: 1.0
*/
require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
if ( ! defined( 'WPINC' )) { die; }

$id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
$table = 'wp_newsletter';
$email = filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);
global $wpdb;

if($wpdb->get_var("SHOW TABLES LIKE '$table'") != $table) {

    $newsletter_sql_create = 
    "CREATE TABLE ".$table."(id INT,
        email VARCHAR(100) UNIQUE, 
        date_d_inscription DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP)".";" ;
    maybe_create_table( $wpdb->get_blog_prefix(0) . $table , $newsletter_sql_create);

}
function checkEmail($email,$table) {
    
    global $wpdb;
    $request = "SELECT email FROM $table;";
    $test = $wpdb->get_results($request);
    $arrayResults = [];
    foreach ($test as $key => $value) {

        $arrayResults[$key] = $value->email;
    }
    if (in_array($email,$arrayResults)) {
        return false;
    }else {

        return true;
    }
};

$checkemail = checkEmail($email,$table);

if ($checkemail) {
    addEmailToNewsletterInDb($id,$email,$table);
}

function addEmailToNewsletterInDb($id,$email, $table) {
    global $wpdb;
    $request= "
    INSERT INTO $table (id,email)
    VALUES ('$id', '$email')";
    $sql = 
    $wpdb->query($wpdb->prepare($request,$table, $id, $email));
    setcookie('newsletter',true);

}


