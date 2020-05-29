<?php 
$id = wp_get_current_user()->ID;
$email = $_POST['email'];
$table = 'wp_newsletter';

function checkEmail($email,$table) {
    global $wpdb;
    $request = "SELECT email FROM $table;";
    $test = $wpdb->get_results($request);
    $arrayResults = [];
    foreach ($test as $key => $value) {

        $arrayResults[$key] = $value->email;
    }
    if (in_array($email,$arrayResults)) {
        echo 'email existant';

    }else {
        echo 'email ok';
        return true;
    }

};
$checkemail = checkEmail($email,$table);

function addEmailToNewsletterInDb($id = '0',$email, $table) {
    
    global $wpdb;
    $request= "
    INSERT INTO  $table (id,email)
    VALUES ('$id', '$email')";
    $sql = 
    $wpdb->query($request);
    echo ('email ajouté');
    
}

if ($checkemail) {
    addEmailToNewsletterInDb($id,$email,$table);
}