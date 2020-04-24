</main>
<footer class="footer">
    <div class="footer__newsletter">
        <div class="links">
        <ul class="links__list">
            <li class="links__contact"><a href="<?= get_permalink(get_page_by_path('contact')); ?>">Contact</a></li>
            <li class="links__link"><a href="#">Newsletter</a></li>

            <li class="links__legal_mentions"><a href="<?= get_permalink(get_page_by_path('mentions-legales')); ?>">Mentions légales</a></li>
            <li class="links__equipe"><a href="<?= get_permalink(get_page_by_path('lequipe')); ?>">L'equipe</a></li>

        </ul>
        </div>
    </div>
    </footer>
    </div>
    <div class="header__menu">
        <span class="ui-button close-menu">
            <i class="fa fa-times-circle-o" aria-hidden="true"></i>
        </span>
        <?php get_template_part('template-parts/nav/nav-burger'); ?>
        </div>        
<?php wp_footer() ?>
</body>      
</html>