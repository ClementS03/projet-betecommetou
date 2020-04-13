<?php

// <nav class="header__navbar" >
// <a href="#" class="header__nav-link">Category 1</a>
// <a href="#" class="header__nav-link">Category 2</a>
// <a href="#" class="header__nav-link">Category 3</a>
// </nav>

$menu = wp_nav_menu([
    'theme_location' => 'menu_header',
    'container_class' => 'header__navbar',
    'echo' => false,
]);

// Comme mon menu est créé par défaut avec de ul/li
// je les supprime via PHP (en mode violent)
$menu = strip_tags($menu, '<a><div>');

// J'ai besoin d'avoir une classe sur mes balises <a>
// Comme WP ne me permet pas de le faire (normalement on les ajoute sur les <li>)
// Je le fait en mode filou grace à PHP
$menu = str_replace('a href', 'a class="header__nav-link" href', $menu);

echo $menu;