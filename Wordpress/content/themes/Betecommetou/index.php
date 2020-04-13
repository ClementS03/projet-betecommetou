<?php get_header(); ?>
<?php 
$args = [
        'posts_per_page' => 1,
        'orderby' => 'DESC',
        'category_name' => "qui-sommes-nous"
];

    $wpqueryArticles = new WP_Query($args);

?>
    <?php if ($wpqueryArticles->have_posts()): while ($wpqueryArticles->have_posts()): $wpqueryArticles->the_post(); ?>

        <?php get_template_part('template-parts/qui-sommes-nous'); ?>

    <?php endwhile; endif; ?>
    
<section class="main__articles__first" style="background-image: url('images/image5.jpeg');">
    <h2 class="main__articles__first__title">Article a la une</h2>
    <article class="main__articles__first__content">
    <p>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas
        soluta odit itaque amet animi deserunt quisquam tempora aut nobis voluptas?
    </p>
    </article>    
</section>
<section class="main__articles">    
    <article class="main__articles__content" style="background-image: url('images/image1.jpeg');">
    <h3 class="main__articles__content__title">Article 1</h3>
    <p>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae error placeat commodi repellat ipsum!
    </p>              
    </article>
    <article class="main__articles__content" style="background-image: url('images/image2.jpeg');">
    <h3 class="main__articles__content__title">Article 2</h3>
    <p>
        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nisi nemo ullam iusto! Quod recusandae nulla,
        consequatur veritatis, odio qui deserunt eos culpa corporis reprehenderit laudantium.
    </p>              
    </article>
    <article class="main__articles__content" style="background-image: url('images/image3.jpeg');">
    <h3 class="main__articles__content__title">Article 3</h3>
    <p>
        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Numquam sint repudiandae esse iusto tenetur aperiam
        voluptate aliquid, sunt explicabo quidem.
    </p>
    </article>
    <article class="main__articles__content" style="background-image: url('images/image4.jpeg');">
    <h3 class="main__articles__content__title">Article 4</h3>
    <p>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi reiciendis porro itaque repellat. Ipsam ea,
    </article>
</section>
<?php get_footer(); ?>
