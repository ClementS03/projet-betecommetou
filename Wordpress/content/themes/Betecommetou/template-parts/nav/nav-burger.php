<!-- <nav class="main-nav">
            <ul>
            <li class="main-nav__item">
                <a href="#">Categorie 1</a>
            </li>
            <li class="main-nav__item">
                <a href="#">Categorie 2</a>
            </li>
            <li class="main-nav__item">
                <a href="#">Categorie 3</a>
            </li>            
            </ul>
        </nav> -->
<?php 

$menu = wp_nav_menu([
    'theme_location' => 'menu_burger_header',
    'container_class' => 'main-nav',
]);