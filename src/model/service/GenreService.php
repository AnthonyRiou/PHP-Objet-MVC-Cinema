<?php

namespace cinema\model\service;

use cinema\model\dao\GenreDao;
use cinema\model\entities\Genre;

class GenreService {
    private $genreDao;
    
    public function __construct() {
        $this->genreDao = new GenreDao();
    }

    public function getAllGenres() {
        $genres = $this->genreDao->findAll();
        return $genres;
    }
    
    public function getbyId($id) {
        $genre = $this->genreDao->findById($id);
        return $genre;
    }

    public function create($genreData)
     {
        // creation de l'obje genre avec =genreDate -> nom = "Western"
       
        $genre = $this->genreDao->createObjectFromFields($genreData);
      
        $this->genreDao->create($genre);
    }
}
