<?php 
/*
Template Name: login
*/
get_header();
wp_login_form([
    'redirect' => get_page_link(get_page_by_title('votre compte')->ID),
    'remember' => false,
]);
?>
    
    <?php
		$url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
		if (strpos($url, 'login/?champs=vides')!==false) {
			echo "<div class='login_failed'>Champs d'identifiant vide</div>";
		}
		if (strpos($url, 'login/?password=vide')!==false) {
			echo "<div class='login_failed'>Champs de mot de passe vide</div>";
		}
		if (strpos($url, 'login/?utilisateur=vide')!==false) {
			echo "<div class='login_failed'>Champs d'identifiant et de mot de passe vide</div>";
		}	
	?>
    <?php
		if (strpos($url,'login/?login=echec') !== false) {
			echo "<div class='login_failed'>Mot de passe ou nom d'utilisateur incorrect</div>";
		}
	?>
	
	

<?php
get_footer();
?>
