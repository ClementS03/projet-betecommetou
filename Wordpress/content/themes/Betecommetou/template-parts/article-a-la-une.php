<pre>
<?php 
$category = get_the_category();
$slug = $category[0]->slug;
?>
</pre>
<section class="main__articles__first" style="background-image: url(<?php the_post_thumbnail_url(); ?>);">
<div class="category_banner <?= $slug; ?> "><span><?= ucfirst($slug); ?></span></div>
    <h2 class="main__articles__first__title"><?php the_title(); ?></h2>
    <article class="main__articles__first__content">
        <?php the_content(); ?>
    </article>    
</section>