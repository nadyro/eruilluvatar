<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of notificationController
 *
 * @author Nadir
 */
class notificationController {

    public function indexAction($args) {
        if (!empty($_GET['id_element'])) {
            if (!empty($_GET['valeur'])) {
                setNotification($_GET['id_element'], $_GET['user_profile'], $_GET['table'], $_GET['valeur'], $_GET['livre_user']);
            } else {
                setNotification($_GET['id_element'], $_GET['user_profile'], $_GET['table']);
            }
        }
    }

    public function affichenotificationAction($args) {

        if ($_GET['notification_seen'] == 1) {
            setNotification_seen($_GET['user_profile'], $_GET['notification_seen']);
        }

        $notification_user = getNotification($_GET['user_profile']);
        $encoded_notification = json_encode($notification_user);
        echo $encoded_notification;
    }

}
