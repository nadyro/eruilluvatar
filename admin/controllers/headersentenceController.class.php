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
        $header_sentence->save();
    }
}
