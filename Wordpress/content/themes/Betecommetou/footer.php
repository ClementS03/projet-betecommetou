</main>
<footer class="footer">
    <div class="footer__newsletter">
    <?php get_template_part('template-parts/nav/nav-footer'); ?>
    </div>
    <div class="newsletter">
        <form action="<?= plugin_dir_url('betecommetou_newsletter'). "betecommetou_newsletter.php" ; ?>" method="post">
            <label for="email"> Souscrivez a la newsletter
            <input type="email" name="email">
            </label>
            <input type="hidden" name="id" value="<?= wp_get_current_user()->ID ?>">
            <input type="submit" value="je souscris"> 
        </form>
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