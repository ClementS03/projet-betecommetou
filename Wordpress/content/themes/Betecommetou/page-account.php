<?php
/*
Template Name: Account
*/
?>
<?php get_header(); ?>
<pre>
<?php 
//var_dump (get_user_meta(2));
?>
</pre>
<?php $user = wp_get_current_user(); ?>
<?php //var_dump($user); ?>
<?php //$meta = get_user_meta($user->ID) ; ?>
<?php //var_dump($meta); ?>

<div class="account">
    <h2 class="account__title">
    <?php echo $user->user_login =='Betecommetou' ? 'Bienvenue , roi de ce chateau , seigneur de ce domaine ' : 'Bonjour ' . $user->user_login . '!!'; ?>
    </h2>
    <div class="account__info">
        <h2>Mon carnet de santé</h2>
        <select name="pets" id="pet-select">
            <option value="">Mes animaux</option>
            <option value="">Pef</option>
            <option value="">Clément</option>
            <option value="">Nico</option>
            <option value="">Marine</option>
            <option value=""> Senora Michue</option>
            <option value="">Kim</option>
            <option value="">Chuck Loris</option>
        </select>
    </div>

    <h2 class="account__info__title">
    Mes infos
    </h2>

    <form action="" class="account_contact_utils">
        <div>
            <label for="file">Sélectionner votre image de profil</label>
            <input type="file" id="image" name="image" class="account_input_avatar" accept="image/*" multiple>
        </div>
        <div>
            <button class="account__form__button">Envoyer</button>
        </div>
            <input type="text" class="contact-form__input" placeholder="Prenom">
            <input type="text" class="contact-form__input" placeholder="Nom">
            <input type="text" class="contact-form__input" placeholder="Email">
            <input type="text" class="contact-form__input" placeholder="Adresse postale">
            <input type="text" class="contact-form__input" placeholder="Numéro de téléphone">
        <div>
            <button class="account__form__button">Modifier</button> 
        </div>
    </form>
</div>

<?php get_footer(); ?>