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
        <select name="pets" id="pet-select" class="contact-form__input">
<?php if($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
            <option value="<?=get_the_ID(); ?>" ><?= get_post_field('nom_de_lanimal'); ?></option>
<?php endwhile; endif;?>
        </select>
            <input type="text" name="animal_name" class="contact-form__input" placeholder="Nom de l'animal">
            <input type="text" name="DateofBirth" class="contact-form__input" placeholder="Date de naissance">
            <input type="text" name="Sex" class="contact-form__input" placeholder="Sexe">
            <input type="text" name="Sterilize" class="contact-form__input" placeholder="Stérilisé">
            <input type="text" name="Insured" class="contact-form__input" placeholder="Assurance">
            <input type="text" name="Breed" class="contact-form__input" placeholder="Race">
            <input type="text" name="Color" class="contact-form__input" placeholder="Robe">
            <input type="text" name="LOF" class="contact-form__input" placeholder="Pedigree">
            <input type="text" name="tatoo" class="contact-form__input" placeholder="Numéro de tatouage">
            <input type="text" name="identification" class="contact-form__input" placeholder="Numéro d'identification électronique">

    </div>

    <h2 class="account__info__title">
    Mes infos
    </h2>

    <form action="" method="post" class="account_contact_utils" id="userForm" data-user-id = <?= $user->ID; ?>>
            <input type="text" name="nickname" class="contact-form__input" placeholder=
            <?= $user->nickname; ?>>
            <input type="text" name="firstname" class="contact-form__input" placeholder=
            <?= $user->first_name; ?>>
            <input type="text" name="lastname" class="contact-form__input" placeholder=
            "<?= $user->last_name; ?>">
            <input type="text" name="email" class="contact-form__input" placeholder="<?= $user->user_email; ?>">
            <input type="text" name="adress" class="contact-form__input" placeholder="<?= $user->adress ;?>">
            <input type="text" name="phone" class="contact-form__input" placeholder="<?= $user->phone ;?>">
        <div>
            <button class="account__form__button">Modifier</button> 
        </div>
    </form>
</div>

<?php get_footer(); ?>