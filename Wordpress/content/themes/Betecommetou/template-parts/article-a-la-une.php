<section class="main__articles__first" style="background-image: url(<?php the_post_thumbnail_url(); ?>);">
    <h2 class="main__articles__first__title"><?php the_title(); ?></h2>
    <article class="main__articles__first__content">
        <?php the_content(); ?>
    </article>    
</section>