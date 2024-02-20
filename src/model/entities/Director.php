<?php

namespace cinema\model\entities;

class Director {
    private $id_realisateur;
    private $nom;
    private $prenom;
    private $photo;
    private $films; 
    
    public function setId_realisateur(int $id_realisateur=null) {
        $this->id_realisateur = $id_realisateur;
        return $this;
    }

    public function getId_realisateur() {
        return $this->id_realisateur;
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
    