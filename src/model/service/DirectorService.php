<?php

namespace cinema\model\service;
use cinema\model\dao\DirectorDao;
use cinema\model\dao\MovieDao;

class DirectorService {

    private $DirectorDao; 
    private $movieDao;


    public function __construct() {

        $this->DirectorDao = new DirectorDao();
        $this->movieDao = new MovieDao();
    }

    public function getAllDirectors() {
        $directors = $this->DirectorDao->findAll();
        return $directors;
    }

    
    public function getbyId($id) {
        $director = $this->DirectorDao->findById($id);
        $movies = $this->movieDao->getMoviesByRealisateur($id);
        foreach ($movies as $movie) {
                $director->addMovie($movie);
        }
        return $director;
    }

    public function create($directorData) {
        
        $director = $this->DirectorDao->createObjectFromFields($directorData);
        $this->DirectorDao->create($director);
    }
}


