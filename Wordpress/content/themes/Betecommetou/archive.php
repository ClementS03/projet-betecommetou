<?php get_header(); ?>

<section class="main__articles"> 
    
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<article class="main__articles__content__archive" style="background-image: url('<?php the_post_thumbnail_url(); ?>');">
    <h3 class="main__articles__content__title"><?php the_title(); ?></h3>
        <?php the_content(); ?>           
</article>

    <?php endwhile; endif; ?>

</section>

<?php get_footer(); ?>