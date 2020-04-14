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

        <?php get_template_part('template-parts/articles/qui-sommes-nous'); ?>

    <?php endwhile; endif; ?>
<?php 
    $args = [
        'posts_per_page' => 1,
        'orderby' => 'DESC',
];
    $wpqueryArticles = new WP_Query($args);
?>
    <?php if ($wpqueryArticles->have_posts()): while ($wpqueryArticles->have_posts()): $wpqueryArticles->the_post(); ?>

        <?php get_template_part('template-parts/articles/article-a-la-une'); ?>

    <?php endwhile; endif; ?>

<section class="main__articles"> 
    
    <?php 
        $args = [
            'posts_per_page' => 4,
            'orderby' => 'rand',
            'category__not_in' => 10,
    ];
        $wpqueryArticles = new WP_Query($args);
    ?>
    <?php if ($wpqueryArticles->have_posts()): while ($wpqueryArticles->have_posts()): $wpqueryArticles->the_post(); ?>

        <?php get_template_part('template-parts/articles/article'); ?>

    <?php endwhile; endif; ?>

</section>
<?php get_footer(); ?>
