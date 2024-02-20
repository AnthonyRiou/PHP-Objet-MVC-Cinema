<?php

namespace cinema\model\entities;

class Actor
{
    private $id_acteur;
    private $nom;
    private $prenom;
    private $photo;
    private $films; 
    
    
 


    public function setId_acteur(int $id_acteur=null) {
        $this->id_acteur = $id_acteur;
        return $this;
    }
    public function getId_acteur() {
        return $this->id_acteur;
    }

    public function setLastName($nom) {
        $this->nom = $nom;
        return $this;
    }       
    public function getLastName() {
        return $this->nom;
    }

    public function setFirstName($prenom) {
        $this->prenom = $prenom;
        return $this;
    }
    public function getFirstName() {
        return $this->prenom;
    }

    public function setPhoto($photo) {
        $this->photo = $photo;
        return $this;
    }
    public function getPhoto() {
        return $this->photo;
    }
    public function addMovie($movie) {
        $this->films[] = $movie;
        return $this;
    }
    public function getFilms() {
        return $this->films;
    }
}