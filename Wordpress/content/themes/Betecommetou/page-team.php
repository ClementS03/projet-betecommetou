<?php 
/*
Template Name: L'équipe
Template Post Type: page
*/
?>
<?php get_header(); ?>



<section class="presentation">
<h2 class="presentation__title"><?php the_title() ?></h2>

    <div class="presentation__person">
    <h3 class="presentation__person__title">Floriane</h3>    
    <img class="presentation__person__picture"src="<?php bloginfo('template_url'); ?>/public/images/flo.png" alt="flo">
    <p class="presentation__person__text"> Floriane est la Product Owner du projet. Toujours prête à ronronner des paroles rassurantes pour remonter le moral des troupes, son implication et sa sensibilité à la thématique du projet ont été un véritable atout dans l'esthétique et les fonctionnalités du site. 
    </p>
    </div>

    <div class="presentation__person">
    <h3 class="presentation__person__title">Marine</h3>   
    <img class="presentation__person__picture" src="<?php bloginfo('template_url'); ?>/public/images/marine.png" alt="flo">   
    <p class="presentation__person__text"> Marine est la Scrum Master. Pétillante et enthousiaste jusqu'au bout des moustaches, ses qualités d'organisation et de créativité ont apporté un bel élan d'inspiration et de cohésion au sein de l'équipe. 
    </p>
    </div>

    <div class="presentation__person">
    <h3 class="presentation__person__title">Pierre François</h3>    
    <img class="presentation__person__picturepef" src="<?php bloginfo('template_url'); ?>/public/images/pef.png" alt="flo">    
    <p class="presentation__person__text"> Pef, notre fidèle référent technique est un fin limier, qui a traqué avec bravoure les nombreuses embuches qui ont parsemé notre projet. Chasseur hors pair, les bugs tremblent désormais devant lui. Ses imposantes compétences techniques, sa patience et sa pédagogie ont permis à toute l'équipe de progresser dans une ambiance bienveillante.
    </p>
    </div>

    <div class="presentation__person">
    <h3 class="presentation__person__title">Nicolas</h3>    
    <img class="presentation__person__picture" src="<?php bloginfo('template_url'); ?>/public/images/nico.png" alt="flo">   
    <p class="presentation__person__text"> Nicolas est le Lead Dev Front du projet. D'apparence discrète, il a su devenir très vite irremplaçable en nous apportant chaque jour un rayon de soleil de joie, de bonne humeur et d'humour désopilant. Très impliqué dans le projet et force de proposition, c'est un compagnon extrêmement attachant !  
    </p>
    </div>

    <div class="presentation__person">
    <h3 class="presentation__person__title">Clément</h3>    
    <img class="presentation__person__picture" src="<?php bloginfo('template_url'); ?>/public/images/clem.png" alt="flo">   
    <p class="presentation__person__text"> Clem, notre Lead Dev Back, a révélé au fil du projet ses plus grandes qualités. Avec beaucoup de patience et de détermination, notre Clément s'est révelé devenir un véritable leader, tirant vaillament le traineau du projet avec une volonté indestructible ! 
    </p>
    </div>
</section>


<?php get_footer(); ?>
