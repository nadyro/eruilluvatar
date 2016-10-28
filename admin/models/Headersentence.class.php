<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Headersentence
 *
 * @author Nadir
 */
class Headersentence extends Base_SQL {

    public $id;
    public $text;
    public $date_ajout;
    public $archivage;

    public function __construct() {
        parent::__construct();
    }

    function getId() {
        return $this->id;
    }

    function setId($id) {
        $this->id = $id;
    }

    function getText() {
        return $this->text;
    }

    function getDate_ajout() {
        return $this->date_ajout;
    }

    function setText($text) {
        $this->text = $text;
    }

    function setDate_ajout($date_ajout) {
        $this->date_ajout = $date_ajout;
    }

    function setArchivage($archivage) {
        $this->archivage = $archivage;
    }

    function getArchivage() {
        return $this->archivage;
    }

}
