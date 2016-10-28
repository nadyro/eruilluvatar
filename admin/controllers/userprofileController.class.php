<?php

class userprofileController {

    public function indexAction($args) {
        $v = new view();
        $v->setView("userprofile");
//        session_start();
//        var_dump($_POST);
        if (!empty($_POST)) {
            $user_infos = getUser("", $_POST['id_user_profile']);
//            var_dump($user_infos);
//            var_dump($_POST);
            if (!empty($user_infos)) {
                $user = new User();
                if ($user_infos[0]['password_user'] == $_POST['password_user_profile']) {
                    if (!empty($_POST['new_password_user_profile'])) {
                        if ($_POST['new_password_user_profile'] === $_POST['new_confirmation_password_user_profile']) {
                            $user->setPassword($_POST['new_password_user_profile']);
                        } else {
                            $user->setPassword($user_infos[0]['password_user']);
                            echo "<input type='hidden' value='1' class='new_mdp_conf_new_mdp_not_equal'>";
                        }
                    }
                    $user->setId($_POST['id_user_profile']);
                    $user->setNom($_POST['nom_user_profile']);
                    $user->setPrenom($_POST['prenom_user_profile']);
                    $user->setEmail($_POST['email_user_profile']);
                    $user->setDate_de_naissance($_POST['birth_date_user_profile']);
                    $user->setDate_inscription_user($_POST['date_inscription_user_profile']);
                } else {
                    echo "<input type='hidden' value='0' class='mot_de_passe_invalide_profile'>";
                }
            }

//            if (!empty($_POST['new_password_user_profile'])) {
//                if (!empty($user_infos)) {
//                    if ($user_infos[0]['password_user'] === $_POST['password_user_profile']) {
//                        $user->setPassword($_POST['new_password_user_profile']);
//                    } else {
//                        echo "<input type='hidden' value='0' class='mot_de_passe_invalide_profile'>";
//                    }
//                }
//            } else {
//                $user->setPassword($_POST['password_user_profile']);
//            }
            $user->save();
        }
//        var_dump($user);
//        var_dump($_SESSION);
    }

}
