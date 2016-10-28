<!DOCTYPE html>
<?php
session_start();
//var_dump($_SESSION);
require "models/Headersentence.class.php";
require "Mobile_Detect/Mobile_Detect.php";
$detect = new Mobile_Detect;
global $global_url_src_admin;
$global_url_src_admin = "http://" . $_SERVER["HTTP_HOST"] . "/myproject/admin/";
$header_sentence_text = getHeaderSentence();
//var_dump($_SERVER);
?>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Euphème</title>
        <meta name="description" content="description de ma page">
        <?php if (!$detect->isMobile() && !$detect->isTablet()) { ?>
            <link rel="stylesheet" href="<?php echo $global_url_src_admin ?>/styles/style_template.css" />
            <link rel="stylesheet" href="<?php echo $global_url_src_admin ?>/styles/index_index.css" />
            <link rel="stylesheet" href="<?php echo $global_url_src_admin ?>/styles/user_profile.css" />
            <link rel="stylesheet" href="<?php echo $global_url_src_admin ?>/styles/livres.css" />
            <link rel="stylesheet" href="<?php echo $global_url_src_admin ?>/styles/connexion_inscription_header.css" />
        <?php } ?>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo $global_url_src_admin ?>/scripts/header_text.js"></script>
        <script type="text/javascript" src="<?php echo $global_url_src_admin ?>/scripts/connexion_inscription_header.js"></script>
        <script type="text/javascript" src="<?php echo $global_url_src_admin ?>/scripts/userprofile.js"></script>
        <script type="text/javascript" src="<?php echo $global_url_src_admin ?>/scripts/livres.js"></script>
        <link href="https://fonts.googleapis.com/css?family=Yatra+One" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Kaushan+Script" rel="stylesheet">

    </head>
    <body>
        <header class="header_template">
            <!--<img height="200" width="200" src="<?php // echo $global_url_src_admin                 ?>/images/space_home.jpg" alt="Home" id="space_home_header">-->
            <h1><a href="<?php echo $global_url_src_admin; ?>">Euphème</a></h1>
            <ul class="liste_header_template">
                <li>
                    <a href="<?php echo $global_url_src_admin . "livres/ajouterlivres" ?>">Ajouter un livre</a> 
                </li>
            </ul>
            <div class="header_text"></div>
            <?php foreach ($header_sentence_text as $key => $value) { ?>
                <input type="hidden" value="<?php echo $value['text'] ?>" class="header_text_all header_text_<?php echo $key ?>">
            <?php } ?>
            <div class="header_buttons">
                <?php if (empty($_SESSION)) { ?>
                    <div class="connexion_header">
                        <p>Connexion</p>
                    </div>
                <?php } ?>
                <?php if (empty($_SESSION)) { ?>
                    <div class="inscription_header">
                        <p>Inscription</p>
                    </div>
                <?php } ?>
                <?php if (!empty($_SESSION)) { ?>
                    <div class="deconnexion_header">
                        <p>Déconnexion</p>
                    </div>
                    <a href="<?php echo $global_url_src_admin . "/userprofile"; ?>">
                        <div class="user_header">
                            <p> <?php echo $_SESSION['user']['prenom_user'] . " " . $_SESSION['user']['nom_user'] ?> </p>
                        </div>
                    </a>
                <?php } ?>
                <div class="renseigner_header_sentence">
                    <p>New Sentence</p>
                </div>
            </div>
            <div class="all_panels">
                <!--Connexion-->
                <div class="connexion_header_panel">
                    <p class="mdp_incorrect">
                        Mot de passe incorrect
                    </p>
                    <p class="connexion_header_panel_text_title">
                        Email
                    </p>
                    <input type="text" placeholder="Email" class="email_connexion_header">
                    <p class="connexion_header_panel_text_title">
                        Mot de passe
                    </p>
                    <img src="<?php echo $global_url_src_admin ?>/images/error.png" class="img_error errors_inscription connexion_header_panel_erreur_password">
                    <input type="password" placeholder="Mot de passe" class="password_connexion_header">
                    <button class="submit_connexion_header">Connexion</button>
                    <button class="cancel_connexion_header">Annuler</button>
                </div>
                <!--Email inexistant-->
                <div class="email_inexistant_message">
                    <p>
                        Email inexistant.<br> Pourquoi ne vous inscrivez-vous pas ? :)
                    </p>
                    <button class="cacher_email_inexistant_message">Fermer</button>
                </div>
                <!--Inscription-->
                <div class="inscription_header_panel">
                    <div class="array_errors">
                        <ul><p class="array_errors_text"></p></ul>

                    </div>
                    <div class="error_and_name">
                        <p class="inscription_header_panel_text_title">
                            Nom
                        </p>
                        <img src="<?php echo $global_url_src_admin ?>/images/error.png" class="img_error errors_inscription inscription_header_panel_erreur_nom">
                    </div>
                    <input type="text" placeholder="Nom" class="nom_inscription_header">

                    <p class="errors_inscription nom_error">
                        La longueur du nom doit être comprise entre 1 et 20 caractères.
                    </p>
                    <div class="error_and_name">
                        <p class="inscription_header_panel_text_title">
                            Prénom
                        </p>
                        <img src="<?php echo $global_url_src_admin ?>/images/error.png" class="img_error errors_inscription inscription_header_panel_erreur_prenom">
                    </div>
    <!--                <p class="errors_inscription inscription_header_panel_erreur_prenom">
                        La longueur du prénom doit être comprise entre 1 et 20 caractères.
                    </p>-->
                    <input type="text" placeholder="Prénom" class="prenom_inscription_header">
                    <p class="errors_inscription prenom_error">
                        La longueur du prenom doit être comprise entre 1 et 20 caractères.
                    </p>
                    <div class="error_and_name">
                        <p class="inscription_header_panel_text_title">
                            Email
                        </p>
                        <img src="<?php echo $global_url_src_admin ?>/images/error.png" class="img_error errors_inscription inscription_header_panel_erreur_email">
                    </div>
    <!--                <p class="errors_inscription inscription_header_panel_erreur_email">
                        Vérifiez votre email.
                    </p>-->
                    <input type="text" placeholder="Email" class="email_inscription_header">
                    <p class="errors_inscription email_error">
                        Vérifiez votre email.
                    </p>
                    <p class="errors_inscription email_error error_email_exist">
                        L'Email est déjà utilisé.
                        <input type="hidden" value="" class="email_exists_error">
                    </p>
                    <div class="error_and_name">
                        <p class="inscription_header_panel_text_title">
                            Date de naissance
                        </p>
                        <img src="<?php echo $global_url_src_admin ?>/images/error.png" class="img_error errors_inscription inscription_header_panel_erreur_birth">
                    </div>
                    <input type="date" placeholder="Date de naissance" class="birth_inscription_header">
                    <div class="error_and_name">
                        <p class="inscription_header_panel_text_title">
                            Mot de passe
                        </p>
                        <img src="<?php echo $global_url_src_admin ?>/images/error.png" class="img_error errors_inscription inscription_header_panel_erreur_password">
                    </div>
    <!--                <p class="errors_inscription inscription_header_panel_erreur_password">
                        La longueur du mot de passe doit être comprise entre 8 et 12 caractères.
                    </p>-->
                    <input type="password" placeholder="Mot de passe" class="password_inscription_header">
                    <p class="errors_inscription password_error">
                        La longueur du mot de passe doit être comprise entre 8 et 16 caractères
                    </p>
                    <div class="error_and_name">
                        <p class="inscription_header_panel_text_title">
                            Confirmation du mot de passe
                        </p>
                        <img src="<?php echo $global_url_src_admin ?>/images/error.png" class="img_error errors_inscription inscription_header_panel_erreur_password_confirmation">
                    </div>
                    <input type="password" placeholder="Mot de passe" class="password_confirmation_inscription_header">
                    <p class="errors_inscription password_confirmation_error">
                        Le mot de passe de confirmation et le mot de passe doivent être identiques.
                    </p>
                    <button class="submit_inscription_header">Inscription</button>
                    <button class="cancel_inscription_header">Annuler</button> 
                </div>
                <!--new sentence-->
                <div class="renseigner_header_sentence_panel">
                    <p class="renseigner_header_sentence_panel_text_title">
                        Partage ton inspiration
                    </p>
                    <textarea class="renseigner_header_sentence_text"></textarea>
                    <div class="container_buttons">
                        <input type="button" class="renseigner_header_sentence_submit" value="Valider">
                        <input type="button" class="renseigner_header_sentence_cancel" value="Annuler">
                    </div>
                </div>
            </div>
        </header>
        <div class="validation_inscription">
            <img src="<?php echo $global_url_src_admin ?>/images/fermer.png" class="bouton_fermer">
            <p>Vous êtes maintenant inscrit ! :) </p>
        </div>
        <div class="confirmation_deconnexion">
            <p>
                Etes-vous sûr(e) de vouloir vous déconnecter ?
            </p>
            <div class="buttons_confirmation_deconnexion">
                <button class="deconnexion_oui" value="0">Oui</button>
                <button class="deconnexion_non" value="1">Non</button>
            </div>
        </div>
        <div class="validation_connexion">
            <img src="<?php echo $global_url_src_admin ?>/images/fermer.png" class="bouton_fermer">
            <p>

            </p>
        </div>
        <div class="all">
            <?php include $this->view; ?>	
        </div>
    </body>
</html>