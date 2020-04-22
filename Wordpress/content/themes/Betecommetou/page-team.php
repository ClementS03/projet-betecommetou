<?php 
/*
Template Name: L'équipe
Template Post TYpe: page
*/
?>
<?php get_header(); ?>

<h2 class="title_team"><?php the_title() ?></h2>
<section class="presentation">
    <div class="flo">
    <img src="<?php bloginfo('template_url'); ?>/public/images/flo.png" alt="flo">
        <h3 class="main-title-team">Floriane</h3>
        <p> Product owner
            représente les intérêts du client, des utilisateurs finaux,
            tranche en cas de conflits fonctionnels de points de vue sur le projet 
            C'est le porteur du projet. 
            Création du product backlog, défini les priorités et la validation des users stories.
        </p>
    </div>
    <div class="marine">
    <img src="<?php bloginfo('template_url'); ?>/public/images/marine.png" alt="flo">
        <h3 class="main-title-team">Marine</h3>
        <p>Scrum Master
            elle s'assure que toutes les tâches sont bien attribuées, suivies et faites, 
            garant de l'avancement du projet, 
            facilite la communication à l'intérieur de l’équipe, 
            fait réaliser les estimations des users stories, 
        </p>
    </div>
    <div class="pef">
    <img src="<?php bloginfo('template_url'); ?>/public/images/pef.png" alt="flo">
        <h3 class="main-title-team">Pierre François</h3>
        <p>
            Référent technique Wordpress
            Git master (gère le versionning du projet, merge les PR...)
            Un référent par techno/lib/bundle particulière du projet
            Le référent technique s’occupe de se documenter sur son domaine et d’en informer les autres
        </p>
    </div>
    <div class="nico">
    <img src="<?php bloginfo('template_url'); ?>/public/images/nico.png" alt="flo">
        <h3 class="main-title-team">Nicolas</h3>
        <p>
            Lead dev front
            Effectue les choix techniques côté back
            S'assure du bon fonctionnement de la facette du projet
        </p>
    </div>
    <div class="clem">
    <img src="<?php bloginfo('template_url'); ?>/public/images/clem.png" alt="flo">
        <h3 class="main-title-team">Clément</h3>
        <p>
            Lead dev front
            Effectue les choix techniques côté front
            S'assure du bon fonctionnement de la facette du projet
        </p>
    </div>
</section>


<?php get_footer(); ?>
