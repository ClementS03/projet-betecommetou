</main>
<footer class="footer">
    <form class="contact-form">
        <h3 class="contact-form__title">Formulaire de contact</h3>
       <?php echo do_shortcode('[contact-form-7 id="89" title="Formulaire contact footer"]') ?>
    </form>
    <div class="footer__newsletter">
        <div class="links">
        <ul class="links__list">
            <li class="links__contact"><a href="#">Contact</a></li>
            <li class="links__link"><a href="#">Newsletter</a></li>
            <li class="links__legal_mentions"><a href="mentions-legales">Mentions légales</a></li>
            <li class="links__equipe"><a href="#">L'equipe</a></li>
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