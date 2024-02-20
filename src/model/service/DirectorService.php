<?php

namespace cinema\model\service;
use cinema\model\dao\DirectorDao;

class DirectorService {

    private $DirectorDao; 

    public function __construct() {

        $this->DirectorDao = new DirectorDao();
    }

    public function getAllDirectors() {
        $directors = $this->DirectorDao->findAll();
        return $directors;
    }

    
    public function getbyId($id) {
        $director = $this->DirectorDao->findById($id);
        return $director;
    }

    public function create($directorData) {
        
        $director = $this->DirectorDao->createObjectFromFields($directorData);
        $this->DirectorDao->create($director);
    }
}


