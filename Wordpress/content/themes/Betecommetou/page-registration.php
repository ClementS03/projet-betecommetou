<?php 
/*
Template Name: registration
*/
?>
<?php get_header(); ?>

<h2 class="title_registration"><?php the_title() ?></h2>



<?= do_shortcode( '[user_registration_form id="63"]' ); ?>


<?php get_footer(); ?>