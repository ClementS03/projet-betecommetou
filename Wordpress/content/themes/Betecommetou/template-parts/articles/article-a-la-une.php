

<article class="main__articles__first" style="background-image: url(<?php the_post_thumbnail_url(); ?>);">

<h3 class="main__articles__first__content__title"><?php the_title(); ?></h3>
    
    <!-- <article class="main__articles__first__content"> -->
        <?php the_excerpt(); ?>
        
        <a href="<?= the_permalink(); ?>">En savoir plus !</a>  
    <!-- </article>     -->
</article>