</main>
<footer class="footer">
    <form class="contact-form">
        <h3 class="contact-form__title">Formulaire de contact</h3>
        <input type="text" class="contact-form__input" placeholder="Prénom NOM">
        <input type="text" class="contact-form__input" placeholder="Votre Email">
        <input type="text" class="contact-form__input" placeholder="Votre message">
        <button class="contact-form__button"><a href="#">Envoyer</a></button>
    </form>
    <div class="footer__newsletter">
        <div class="social-nav">
        <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
        <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
        <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
        </div>
        <div class="links">
        <ul class="links__list">
            <li class="links__contact"><a href="#">Contact</a></li>
            <li class="links__link"><a href="#">Newsletter</a></li>
            <li class="links__legal_mentions"><a href="#">Mentions légales</a></li>
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