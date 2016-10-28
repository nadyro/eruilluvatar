<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class headersentenceController {

    public function indexAction($args) {
        $header_sentence = new Headersentence();
        $header_sentence->setText($_GET['text_header_sentence']);
        $header_sentence->setDate_ajout(date("Y:m:d:G:i:s", strtotime("now")));
        $header_sentence->setArchivage(0);
//        die();
        $header_sentence->save();
    }

//    public function affichagesentenceAction($args) {
//        global $pdo;
//        $dsn = "mysql:dbname=eupheme;host=localhost";
//        $dbuser = "root";
//        $dbpwd = "";
//        try {
//            $pdo = new PDO($dsn, $dbuser, $dbpwd);
//        } catch (PDOException $e) {
//            echo "connexion échouée : " . $e->getMessage();
//        }
//        $query = $pdo->prepare("SELECT * FROM headersentence WHERE archivage = 0");
//        $query->execute();
//        $row = $query->fetchAll(PDO::FETCH_ASSOC);
//        foreach($row as $key => $value){
//            echo $value['text'];
//        }
//    }

}
