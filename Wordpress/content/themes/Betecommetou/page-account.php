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
<?php //var_dump(get_role( 'subscriber' )); ?>

<?php $args = array(
    'post_type' => 'healthbook',
    'author' => $user->ID,
    
);
$query = new WP_Query($args);
?>
<pre>
    <?php
//var_dump($query);
?>
</pre>
<div class="account">
    <h2 class="account__title">
    <?php echo $user->user_login =='Betecommetou' ? 'Bienvenue , roi de ce chateau , seigneur de ce domaine ' : 'Bonjour ' . $user->user_login . '!!'; ?>
    </h2>
    <div class="account__info">
        <h2>Mon carnet de santé</h2>
        <img class="account_animal_image" src="" alt="">
        <pre>
    </pre>
        <select name="pets" id="pet-select">
<?php if($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
            <option value="<?=get_the_ID(); ?>" data-animal-image="<?= get_the_post_thumbnail_url(); ?>" data-animal-name="<?= get_post_field('nom_de_lanimal') ;?>"><?= get_post_field('nom_de_lanimal'); ?></option>
<?php endwhile; endif;?>
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
            <input type="text" name="nickname" class="contact-form__input" placeholder=
            <?= $user->nickname; ?>>
            <input type="text" name="firstname" class="contact-form__input" placeholder=
            <?= $user->first_name; ?>>
            <input type="text" name="lastname" class="contact-form__input" placeholder=
            <?= $user->last_name; ?>>
            <input type="text" name="email" class="contact-form__input" placeholder=<?= $user->user_email; ?>>
            <input type="text" name="adress" class="contact-form__input" placeholder="Adresse postale">
            <input type="text" name="phone" class="contact-form__input" placeholder="Numéro de téléphone">
        <div>
            <button class="account__form__button">Modifier</button> 
        </div>
    </form>
</div>

<?php get_footer(); ?>