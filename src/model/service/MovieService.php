<?php

namespace cinema\model\service;

use cinema\model\dao\MovieDao;
use cinema\model\dao\ActorDao;
use cinema\model\dao\GenreDao;
use cinema\model\dao\DirectorDao;

class MovieService {

    private $movieDao;
    private $actorDao;
    private $genreDao;
    private $directorDao;

    public function __construct() {
        $this->movieDao = new MovieDao();
        $this->actorDao = new ActorDao();
        $this->directorDao = new DirectorDao();
        $this->genreDao = new GenreDao();
    }

    public function getAllFilms() {
        $movies = $this->movieDao->findAll();
        return $movies;
    }

    public function getbyId($idf)
    {     
        // creation de l'objet movie référencé par $movie.
        $movie = $this->movieDao->findById($idf);  // recherche dans movieDao ( $id = id du movie )
       // renvoi de laliste des objets actors.
        $actors = $this->actorDao->findByMovie($idf); // recherche des acteurs pour 1 film 
        foreach ($actors as $actor) {
            // fonction dans la classe Movie sans Entities
            $movie->addActor($actor);  // fonction ajoute 1 acteur à l'objet movie (voire classe/entité Movie)
        }

        $genre = $this->genreDao->findByMovie($idf); // recherche du genre 
        $movie->setGenre($genre);
        $director = $this->directorDao->findByMovie($idf);
        $movie->setDirector($director);
      
       /* $comments = $this->commentDao->findByMovie($id);*/
        return $movie;
    }

    public function create($movieData) {
        // creation de l'objet movie référencé par $movie.
        $movie = $this->movieDao->createObjectFromFields($movieData);
        $genre = $this->genreDao->createObjectFromFields($movieData);
        $movie->setGenre($genre);
        $director = $this->directorDao->createObjectFromFields($movieData);
        $movie->setDirector($director);
        $this->movieDao->create($movie);
    }

    public function update($id,$filmData)
    {
        $movie = $this->movieDao->createObjectFromFields($filmData); 
        $genre = $this->genreDao->findById($filmData['id_genre']);
        $movie->setGenre($genre);
        $director = $this->directorDao->findById($filmData['id_realisateur']);
        $movie->setDirector($director);
        $this->movieDao->update($id,$movie);
    }

    public function addActeur_film($acteurData) {  
        // print_r($acteurData);die;
        // print_r($acteur);die;
        $this->movieDao->addActeur($acteurData);
    }

    public function getMoviesByActor($id) {
        $movies = $this->movieDao->getMoviesByActor($id);
        return $movies;
    }
}