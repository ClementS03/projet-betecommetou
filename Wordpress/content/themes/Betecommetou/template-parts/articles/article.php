<?php 
foreach ((get_the_category()) as $categorie) {
    $slug = $categorie->slug;
    $ID = $categorie->cat_ID;
}
?>
<article class="main__articles__content" style="background-image: url('<?php the_post_thumbnail_url(); ?>');">
<div class="category_banner <?= $slug; ?> "><a href="<?= get_category_link($ID) ?>"><?= ucfirst($slug); ?></a></div>
    <h3 class="main__articles__content__title"><?php the_title(); ?></h3>
        <?php the_excerpt(); ?>  
    <a  href="<?= the_permalink(); ?>">En savoir plus !</a>         
</article>