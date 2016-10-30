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
class Livres extends Base_SQL {

    public $id;
    public $id_user;
    public $id_type;
    public $titre;
    public $nom_auteur;
    public $collection;
    public $editeur;
    public $genre;
    public $date_parution;
    public $image;
    public $synopsis;

    function getId() {
        return $this->id;
    }

    function getId_user() {
        return $this->id_user;
    }

    function getId_type() {
        return $this->id_type;
    }

    function getTitre() {
        return $this->titre;
    }

    function getNom_auteur() {
        return $this->nom_auteur;
    }

    function getCollection() {
        return $this->collection;
    }

    function getEditeur() {
        return $this->editeur;
    }

    function getGenre() {
        return $this->genre;
    }

    function getDate_parution() {
        return $this->date_parution;
    }

    function getImage() {
        return $this->image;
    }

    function getSynopsis() {
        return $this->synopsis;
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

    function setTitre($titre) {
        $this->titre = $titre;
    }

    function setNom_auteur($nom_auteur) {
        $this->nom_auteur = $nom_auteur;
    }

    function setCollection($collection) {
        $this->collection = $collection;
    }

    function setEditeur($editeur) {
        $this->editeur = $editeur;
    }

    function setGenre($genre) {
        $this->genre = $genre;
    }

    function setDate_parution($date_parution) {
        $this->date_parution = $date_parution;
    }

    function setImage($image) {
        $this->image = $image;
    }

    function setSynopsis($synopsis) {
        $this->synopsis = $synopsis;
    }

}
