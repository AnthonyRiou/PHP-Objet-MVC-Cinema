<?php

namespace cinema\model\service;

use cinema\model\dao\GenreDao;
use cinema\model\entities\Genre;
use cinema\model\dao\MovieDao;

class GenreService {
    private $genreDao;
    private $movieDao;
    
    public function __construct() {
        $this->genreDao = new GenreDao();
        $this->movieDao = new MovieDao();
    }

    public function getAllGenres() {
        $genres = $this->genreDao->findAll();
        return $genres;
    }
    
    public function getbyId($id) {
        $genre = $this->genreDao->findById($id);
        $movies = $this->movieDao->getMoviesByGenre($id);
        foreach ($movies as $movie) {
                $genre->addMovie($movie);
        }
        return $genre;
    }

    public function create($genreData)
     {
        // creation de l'obje genre avec =genreDate -> nom = "Western"
        $genre = $this->genreDao->createObjectFromFields($genreData);
        $this->genreDao->create($genre);
    }
}
