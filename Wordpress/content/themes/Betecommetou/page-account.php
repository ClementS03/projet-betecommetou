<?php
/*
Template Name: Account
*/
?>
<?php get_header(); ?>
<?php $user = wp_get_current_user(); ?>
<?php clean_user_cache($user->ID); ?>
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
    <?php echo $user->user_login =='Betecommetou' ? 'Bienvenue , roi de ce chateau , seigneur de ce domaine ' : 'Bonjour ' . $user->user_login . ' !!'; ?>
    </h2>
    <div class="account__info">
        <h2>Mon carnet de santé</h2>
        <img class="account_animal_image" src="" alt="">

        <select name="pets" id="pet-select" class="contact-form__select">

        <option value="">Choisissez le carnet de santé</option>

<?php if($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
        <?php clean_user_cache($user->ID); ?>
            <option value="<?=get_the_ID();?>" ><?=the_title();?></option>
<?php endwhile; endif;?>
        </select>

        <!-- Modal -->
        <div class="modal close">
            <form class="account_contact_utils" action="" data-user-id-modal="<?= $user->ID; ?>">
                <span class="addSpan">
                    <i class="fa fa-times" aria-hidden="true"></i>
                </span>
                <h2 class="modal-title">Veuillez entrer le nom de votre Animal</h2>
                <input class="contact-form__input" name="animalName" type="text">
                <button class="account__form__button">Valider</button>
            </form>
        </div>
        <div class="modalDelete close">
            <form class="account_contact_utils" id="deleteForm" action="" >
                <span class="deleteSpan">
                    <i class="fa fa-times" aria-hidden="true"></i>
                </span>
                <h2 class="modal-title">Choisissez un animal a supprimer</h2>
                <select name="petsdeletemodal" id="pet-select-deletemodal" class="contact-form__select">
                <option value="">Choisissez votre animal à supprimer</option>
                    <?php if($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
                        <option value="<?=get_the_ID(); ?>" ><?= the_title(); ?></option>
                    <?php endwhile; endif;?>
                </select>
                <button class="account__form__button deleteButton">Supprimer</button>
            </form>
        </div>

            <div id="select-buttons">
                <button id="add" class="account__form__button">Ajouter</button>
                <button id="delete" class="account__form__button">Supprimer</button>
            </div>

            <form action="" method="post" class="account_contact_utils" id="animalForm">
                <label for="nom de l'animal"> Nom de l'animal
                <input type="text" name="animal_name" class="contact-form__input" placeholder="Nom de l'animal">
                </label>
                <label for="date de naissance"> Date de naissance
                <input type="text" name="DateofBirth" class="contact-form__input" placeholder="Date de naissance">
                </label>
                <label for="sexe"> Sexe
                <select name="Sex" class="contact-form__input" >
                    <option value="">Sexe de l'animal ?</option>
                    <option value="Male">Male</option>
                    <option value="Femelle">Femelle</option>
                </select>
                </label>
                <label for="stérilisé"> Stérilisation
                <select name="sterilized" class="contact-form__input" >
                    <option value="">Est-il stérilisé ?</option>
                    <option value="Oui">Oui</option>
                    <option value="Non">Non</option>
                </select>
                </label>
                <label for="assurance"> Assurance 
                <select name="Insured" class="contact-form__input" >
                    <option value="">Est-il assuré ?</option>
                    <option value="Oui">Oui</option>
                    <option value="Non">Non</option>
                </select>
                </label>
                <label for="race"> Race
                <input type="text" name="Breed" class="contact-form__input" placeholder="Race">
                </label>
                <label for="robe"> Robe
                <input type="text" name="Color" class="contact-form__input" placeholder="Robe">
                </label>
                <label for="pedigree"> Pedigree
                <select name="LOF" class="contact-form__input" >
                    <option value="">Est-il LOF ?</option>
                    <option value="Oui">Oui</option>
                    <option value="Non">Non</option>
                </select>
                </label>
                <label for="tatoo"> Numéro de tatouage
                <input type="text" name="tatoo" class="contact-form__input" placeholder="Numéro de tatouage">
                </label>
                <label for="id number"> Numéro d'identification électronique
                <input type="text" name="identification" class="contact-form__input" placeholder="Numéro d'identification électronique">
                </label>
                <label for="diseases"> Maladies / Alergies
                <textarea type="text" name="diseases" class="contact-form__input" placeholder="Maladies / Allergies"></textarea>
                </label>
                <label for="vaccins"> Vaccins
                <textarea type="text" name="vaccins" class="contact-form__input" placeholder="Vaccins"></textarea>
                </label>
                <label for="observations"> Observations
                <textarea type="text" name="observations" class="contact-form__input" placeholder="Observations"></textarea>
                </label>
                <label for="veterinary"> Email Veterinaire
                <input type="text" name="veterinary" class="contact-form__input" placeholder="Email Veterinaire">
                </label>
                

            <div>
                <button class="account__form__button">Modifier</button> 
            </div>
            </form>
    </div>

    <h2 class="account__info__title">
    Mes infos
    </h2>

    <form action="" method="post" class="account_contact_utils" id="userForm" data-user-id = <?= $user->ID; ?>>
            <label for="Surnom">Surnom
            <input type="text" name="nickname" class="contact-form__input" placeholder="Surnom" value=
            <?= $user->nickname; ?>>
            </label>
            <label for="Prénom">Prénom
            <input type="text" placeholder="Prénom" name="firstname" class="contact-form__input" value=
            <?= $user->first_name; ?>>
            </label>
            <label for="Nom">Nom
            <input type="text" placeholder="Nom" name="lastname" class="contact-form__input" value=
            "<?= $user->last_name; ?>">
            </label>
            <label for="Email">Email
            <input type="text" placeholder="Email" name="email" class="contact-form__input" value="<?= $user->user_email; ?>">
            </label>
            <label for="Adresse">Adresse
            <input type="text" placeholder="adresse" name="adress" class="contact-form__input" value="<?= $user->adress ;?>">
            </label>
            <label for="Numéro de téléphone">Numéro de téléphone
            <input type="text" placeholder="numéro de téléphone" name="phone" class="contact-form__input" value="<?= $user->phone ;?>">
            </label>
        <div>
            <button class="account__form__button">Modifier</button> 
        </div>
    </form>
</div>
    <script>
    let token = localStorage.getItem('token');
    if (token === null) {
        location.href = "<?= wp_logout_url(); ?>";
    }
    </script>

<?php get_footer(); ?>