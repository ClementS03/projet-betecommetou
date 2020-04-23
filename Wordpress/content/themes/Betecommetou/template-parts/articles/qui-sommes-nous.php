<section class="main__presentation">    
    <h2 class="main__presentation__title">
    <?php the_title(); ?>
    </h2>
    <div class="content">
    <img src="<?php bloginfo('template_url'); ?>/public/images/corgi.png" alt="corgi">
        <div class="main__presentation__content"> 
            <?php the_content(); ?>
        </div>
    </div> 
</section>