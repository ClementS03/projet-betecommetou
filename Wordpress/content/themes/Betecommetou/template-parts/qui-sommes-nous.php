<section class="main__presentation">    
    <h2 class="main__presentation__title">
    <?php the_title(); ?>
    </h2>
    <div class="content">
        <img src=<?php the_post_thumbnail_url(); ?> alt="" class="main__presentation__image">
        <p class="main__presentation__content"> 
            <?php the_content(); ?>
        </p>
    </div> 
</section>