<?php

namespace cinema\controller;

use cinema\model\service\ActorService;
use cinema\model\service\DirectorService;
use cinema\model\service\GenreService;
use cinema\model\service\MovieService;
use cinema\model\service\UserService;



class BackController {

    private $actorService;
    private $directorService;
    private $genreService;
    private $movieService;
    private $userService;
    



    public function __construct(){
        $this->actorService = new ActorService();
        $this->directorService = new DirectorService();
        $this->genreService = new GenreService();
        $this->movieService = new MovieService();
        $this->userService = new UserService();
        
    }

    public function inscription($userData) {
        $this->userService->create($userData);
    }

    public function connexion($userData) {
       return ($this->userService->login($userData));
    }

    public function addacteur($acteurData) {
        $this->actorService->create($acteurData);
      
    }
    
    public function addgenre($genreData) {
        $this->genreService->create($genreData);
    
}

    public function addrealisateur($realisateurData) {
        $this->directorService->create($realisateurData);
}

    public function addfilm($filmData) {
        $this->movieService->create($filmData);
}
    public function modif_film($id, $filmData) {
        $this->movieService->update($id, $filmData);
}

    public function addacteur_film($acteurData) {
        $this->movieService->addActeur_film($acteurData);
    }

}