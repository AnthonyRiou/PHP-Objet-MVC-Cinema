<?php

namespace cinema\model\service;

use cinema\model\dao\ActorDao;
use cinema\model\dao\MovieDao;

class ActorService {

    private $actorDao;
    private $movieDao;

    public function __construct() {

        $this->actorDao = new ActorDao();
        $this->movieDao = new MovieDao();
    }

    public function getAllActors() {
        $acteurs = $this->actorDao->findAll();
        // print_r($acteurs);die;
        return $acteurs;
    }

    public function getbyId($id) {
        $acteur = $this->actorDao->findById($id);
        $movies = $this->movieDao->getMoviesByActor($id);
        foreach ($movies as $movie) {
                $acteur->addMovie($movie);
        }
        return $acteur;
    }

    public function create($actorData) {
        
        $acteur = $this->actorDao->createObjectFromFields($actorData);
        $this->actorDao->create($acteur);
    }
}