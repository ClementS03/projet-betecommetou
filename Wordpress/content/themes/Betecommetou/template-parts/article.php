<article class="main__articles__content" style="background-image: url('<?php the_post_thumbnail_url(); ?>');">
    <h3 class="main__articles__content__title"><?php the_title(); ?></h3>
        <?php the_excerpt(); ?>           
</article>