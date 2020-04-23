<section class="main__presentation" >

    <div class="main__presentation__picture">
    <img src="<?php the_post_thumbnail_url(); ?>" alt="corgi">
    </div>

    <div class="main__presentation__content">
        <h2 class="main__presentation__title">
        <?php the_title(); ?>
        </h2>
        <div class="main__presentation__text">
        <?php the_content(); ?>
        </div>
    </div>

</section>