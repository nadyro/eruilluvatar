<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class userController {

    public function inscriptionAction($args) {
        $user = new User();
        $user->setNom($_GET['nom_inscription_header']);
        $user->setPrenom($_GET['prenom_inscription_header']);
        $email_verif = $_GET['email_inscription_header'];
        if (empty(getEmail($email_verif))) {
            $user->setEmail($_GET['email_inscription_header']);
        } else {
            echo "false";
        }
        $user->setDate_de_naissance($_GET['birth_inscription_header']);
        $user->setPassword($_GET['password_inscription_header']);
        $user->setDate_inscription_user(date("Y:m:d:G:i:s", strtotime("now")));
        $user->save();
        $user = getUser($email_verif);
        session_start();
        $_SESSION['user'] = array("id" => $user[0]['id'], "nom_user" => $user[0]['nom_user'], "prenom_user" => $user[0]['prenom_user'],
            "email_user" => $user[0]['email_user'], "birth_date_user" => $user[0]['birth_date_user'], "password_user" => $user[0]['password_user'],
            "date_inscription_user" => $user[0]['date_inscription_user']);
    }

    public function connexionAction($args) {
        $user = getUser($_GET['email_connexion']);
        if (empty($user)) {
            echo 1;
        } else {
            if ($_GET['password_connexion'] !== $user[0]['password_user']) {
                echo 2;
            } else {
                echo "Bienvenue " . $user[0]['prenom_user'] . " ! C'est un plaisir de vous revoir !";
                session_start();
                $_SESSION['user'] = array("id" => $user[0]['id'], "nom_user" => $user[0]['nom_user'], "prenom_user" => $user[0]['prenom_user'],
                    "email_user" => $user[0]['email_user'], "birth_date_user" => $user[0]['birth_date_user'], "password_user" => $user[0]['password_user'],
                    "date_inscription_user" => $user[0]['date_inscription_user']);
            }
        }
    }

    public function deconnexionAction($args) {
        session_start();
        session_destroy();
        header('Location :http://localhost/myproject/');
    }

}
