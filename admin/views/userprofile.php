<div class="all_little_half"></div>
<div class="all_first_half">
    <div class="titre_first_half">
        <p>Informations personnelles</p>
    </div>
    <?php // var_dump($_SESSION); ?>
    <form action="<?php echo $global_url_src_admin . '/userprofile' ?>" method="post" class="form_user_profile">
        <input type="hidden" value="<?php echo $_SESSION['user']['id']; ?>" name="id_user_profile">
        <input type="hidden" value="<?php echo $_SESSION['user']['date_inscription_user']; ?>" name="date_inscription_user_profile">
        <input type="hidden" class="nom_user_profile" name="nom_user_profile" value="<?php echo!empty($_SESSION) ? $_SESSION['user']['nom_user'] : ""; ?>" placeholder="<?php echo!empty($_SESSION) ? $_SESSION['user']['nom_user'] : ""; ?>">
        <input type="hidden" class="prenom_user_profile" name="prenom_user_profile" value="<?php echo!empty($_SESSION) ? $_SESSION['user']['prenom_user'] : ""; ?>" placeholder="<?php echo!empty($_SESSION) ? $_SESSION['user']['prenom_user'] : ""; ?>">
        <p>Email</p>
        <input type="text" class="email_user_profile" name="email_user_profile" value="<?php echo!empty($_SESSION) ? $_SESSION['user']['email_user'] : "" ?>" placeholder="<?php echo!empty($_SESSION) ? $_SESSION['user']['email_user'] : "" ?>">
        <input type="hidden" class="birth_date_user_profile" name="birth_date_user_profile" value="<?php echo!empty($_SESSION) ? $_SESSION['user']['birth_date_user'] : "" ?>">
        <p>Mot de passe</p>
        <p class="message_mot_de_passe_invalide_profile_0 msg_error_profile">Mot de passe invalide</p>
        <img src="<?php echo $global_url_src_admin ?>/images/error.png" class="img_error errors_inscription img_error_profile image_mot_de_passe_invalide_profile_0">
        <input type="password" class="password_user_profile" name="password_user_profile" value="<?php echo!empty($_SESSION) ? $_SESSION['user']['password_user'] : "" ?>">
        <p>Nouveau mot de passe</p>
        <input type="password" class="new_password_user_profile" name="new_password_user_profile" placeholder="Nouveau mot de passe">
        <p>Confirmez le nouveau mot de passe</p>
        <p class="message_mot_de_passe_invalide_profile_1 msg_error_profile">Le mot de passe de confirmation doit être identique au nouveau mot de passe</p>
        <img src="<?php echo $global_url_src_admin ?>/images/error.png" class="img_error errors_inscription img_error_profile image_mot_de_passe_invalide_profile_1">
        <input type="password" class="new_confirmation_password_user_profile" name="new_confirmation_password_user_profile" placeholder="Nouveau mot de passe de confirmation">

        <input type="submit" value="Valider" class="submit_user_profile">

    </form>
</div>
<div class="all_second_half">
    <div class="titre_second_half">
        <p>Dernières activités</p>
    </div>
    <div class="dernieres_activites">
        <?php for ($i = 0; $i <= 4; $i++) { ?>
            <div class="activite_<?php echo $i ?> une_activite">
                Vous avez aimé la citation de Luc.
            </div>
        <?php }
        ?>

    </div>
</div>
<div class="all_little_half"></div>