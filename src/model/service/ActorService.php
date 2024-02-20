<?php

namespace cinema\model\service;

use cinema\model\dao\ActorDao;

class ActorService {

    private $actorDao;

    public function __construct() {

        $this->actorDao = new ActorDao();
    }

    public function getAllActors() {
        $acteurs = $this->actorDao->findAll();
        // print_r($acteurs);die;
        return $acteurs;
    }

    public function getbyId($id) {
        $acteur = $this->actorDao->findById($id);
        return $acteur;
    }

    public function create($actorData) {
        
        $acteur = $this->actorDao->createObjectFromFields($actorData);
        $this->actorDao->create($acteur);
    }
}