<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of livres
 *
 * @author Nadir
 */
class Genres extends Base_SQL {

    public $id;
    public $libelle;
    public $image;
    public $date_ajout;

    function getId() {
        return $this->id;
    }

    function getLibelle() {
        return $this->libelle;
    }

    function getImage() {
        return $this->image;
    }

    function getDate_ajout() {
        return $this->date_ajout;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setLibelle($libelle) {
        $this->libelle = $libelle;
    }

    function setImage($image) {
        $this->image = $image;
    }
    
    function setDate_ajout($date_ajout) {
        $this->date_ajout = $date_ajout;
    }



}
