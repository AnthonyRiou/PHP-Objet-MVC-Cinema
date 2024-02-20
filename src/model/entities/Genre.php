<?php

namespace cinema\model\entities;

class Genre {
    private $id_genre;
    private $nom_genre;
    private $photo;
    private $films; 

    public function setId_genre(int $id_genre=null) {
        $this->id_genre = $id_genre;
        return $this;
    }

    public function getId_genre() {
        return $this->id_genre;
    }

    public function setNom_genre($nom_genre) {
        $this->nom_genre = $nom_genre;
        return $this;
    }

    public function getNom_genre() {
        return $this->nom_genre;
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