<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of commentairesController
 *
 * @author Nadir
 */
class commentairesController {

    public function indexAction($args) {
        if (!empty($_GET)) {
            $commentaire = new Commentaires();
            $commentaire->setId_user($_GET['id_user']);
            $commentaire->setId_type(2);
            $commentaire->setValeur(htmlspecialchars($_GET['valeur']));
            $commentaire->setDate_ajout(date("Y-m-d:G:m:s", strtotime("now")));
            $commentaire->setId_type_element($_GET['id_element']);
            $commentaire->save();
            insertUser_Commentaire($_GET['id_user'], $_GET['id_element'], 2);
        }
    }

    public function commentaireslikeAction($args) {
        if (!empty($_GET['user_profile'])) {
            $like_commentaires = setCommentaires_Likes($_GET['element_one'], $_GET['user_profile'], date("d/m/y:H:i:s", strtotime("now")), $_GET['element_two'], $_GET['id_type']);
        }
    }

}
