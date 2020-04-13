<?php 
foreach ((get_the_category()) as $categorie) {
    $slug = $categorie->slug;
}
?>
<article class="main__articles__content" style="background-image: url('<?php the_post_thumbnail_url(); ?>');">
<div class="category_banner <?= $slug; ?> "><span><?= ucfirst($slug); ?></span></div>
    <h3 class="main__articles__content__title"><?php the_title(); ?></h3>
        <?php the_excerpt(); ?>           
</article>