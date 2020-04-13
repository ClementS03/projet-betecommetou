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
        <h1 class="header__title">
            <i class="fa fa-paw" aria-hidden="true"></i> Bêtecommetou <i class="fa fa-paw" aria-hidden="true"></i>
        </h1>     
        <nav class="header__navbar" >
            <a href="#" class="header__nav-link">Category 1</a>
            <a href="#" class="header__nav-link">Category 2</a>
            <a href="#" class="header__nav-link">Category 3</a>
        </nav>
        <span class="ui-button open-menu">
            <i class="fa fa-bars" aria-hidden="true"></i>
        </span>
        <button class="header__login__button">Mon compte</button>
        </header>
        <main class="main">