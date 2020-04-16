<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>

<body>
    <div class="wrapper">    
        <header class="header">
        <a href="<?= home_url(); ?>"><h1 class="header__title">
            <i class="fa fa-paw" aria-hidden="true"></i> <?php bloginfo('title'); ?> <i class="fa fa-paw" aria-hidden="true"></i>
        </h1></a> 
        <?php get_template_part('template-parts/nav/nav-header'); ?>
        <span class="ui-button open-menu">
            <i class="fa fa-bars" aria-hidden="true"></i>
        </span>
        <?php if( !is_user_logged_in()) : ?>
        <a href="<?= get_page_link(56); ?>" class="header__login__button"> <?= get_page_by_title( 'formulaire d\'inscription' )->post_title;?></a>
        <a href="<?= get_page_link(40) ; ?>" class="header__login__button"> <?= get_page_by_title( 'Connexion !' )->post_title;?></a>
        <?php else : ?>
        <a href="<?= get_page_link(58); ?>" class="header__login__button"> <?= get_page_by_title( 'votre compte' )->post_title;?></a>
        <a href="<?= wp_logout_url(home_url())?>" class="header__signout__button"> Bye Bye</a>
        <?php endif; ?>
        
        </header>
        <main class="main">