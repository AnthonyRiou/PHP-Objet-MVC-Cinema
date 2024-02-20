<?php

namespace cinema\model\entities;

class Movie {
    private $id_film;

    private $titre;
    private $date_de_sortie;
    private $affiche;
    private $actors;
    private $realisateur;
    private $genre;
  

    public function setId_film(int $id_film=null) {
        $this->id_film = $id_film;
        return $this;
    }

    public function getId_film() {
        return $this->id_film;
    }      

    public function setTitre($titre) {
        $this->titre = $titre;
        return $this;
    }

    public function getTitre() {
        return $this->titre;
    }

    public function setDate_de_sortie($date_de_sortie) {
        $this->date_de_sortie = $date_de_sortie;
        return $this;
    }

    public function getDate_de_sortie() {
        return $this->date_de_sortie;
    }
    
    public function setAffiche($affiche) {
        $this->affiche = $affiche;
        return $this;
    }
    
    public function getAffiche() {
        return $this->affiche;
    }

    public function setGenre(Genre $genre) {
        $this->genre = $genre ;
        return $this;
    }

    public function getGenre() {
        return $this->genre;
    }

    public function setDirector(Director $realisateur) {
        $this->realisateur = $realisateur;
        return $this;
    }
    
    public function getDirector() {
        return $this->realisateur;
    }

    public function addActor($actor) {
        $this->actors[] = $actor;
        return $this;
    }
    
    public function getActors() {
        return $this->actors;
    }

}