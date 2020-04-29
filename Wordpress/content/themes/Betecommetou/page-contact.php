<?php
/*
Template Name: Contact
*/

get_header(); ?>

<div class="contact">

<h2 class="contact__title"><?= the_title(); ?></h2>


<?= do_shortcode('[contact-form-7 id="32" title="Formulaire contact footer"]'); ?>


</div>

<?php get_footer(); ?>