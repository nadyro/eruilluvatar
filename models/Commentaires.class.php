<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Commentaires
 *
 * @author Nadir
 */
class Commentaires extends Base_SQL {
    
    
    public $id;
    public $id_user;
    public $id_type;
    public $valeur;
    public $date_ajout;
    public $id_type_element;
    
    
    function getId() {
        return $this->id;
    }

    function getId_user() {
        return $this->id_user;
    }

    function getId_type() {
        return $this->id_type;
    }

    function getValeur() {
        return $this->valeur;
    }

    function getDate_ajout() {
        return $this->date_ajout;
    }

    function getId_type_element() {
        return $this->id_type_element;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setId_user($id_user) {
        $this->id_user = $id_user;
    }

    function setId_type($id_type) {
        $this->id_type = $id_type;
    }

    function setValeur($valeur) {
        $this->valeur = $valeur;
    }

    function setDate_ajout($date_ajout) {
        $this->date_ajout = $date_ajout;
    }

    function setId_type_element($id_type_element) {
        $this->id_type_element = $id_type_element;
    }


    
}
