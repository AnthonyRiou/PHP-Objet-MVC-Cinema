<?php

namespace cinema\controller;

use cinema\model\service\ActorService;
use cinema\model\service\DirectorService;
use cinema\model\service\GenreService;
use cinema\model\service\MovieService;

use Twig\Environment;

class FrontController {

    private $actorService;
    private $directorService;
    private $genreService;
    private $movieService;
    private $twig;



    public function __construct($twig){
        $this->actorService = new ActorService();
        $this->directorService = new DirectorService();
        $this->genreService = new GenreService();
        $this->movieService = new MovieService();
        $this->twig = $twig;
    }

    public function acteurs() {
        $acteurs = $this->actorService->getAllActors();
        echo $this->twig->render('acteurs.twig',["acteurs"=>$acteurs]);
        
        // require ('./src/view/acteurs.php');
//         echo '<pre>';
//         print_r($acteurs);   
//         echo '</pre>';
}
    public function acteur($id) {
        $acteur = $this->actorService->getbyId($id);
        $movies = $this->movieService->getMoviesByActor($id);
        echo $this->twig->render('acteur.twig',["acteur"=>$acteur, "movies"=>$movies ]);
        // require ('./src/view/acteur.php');
        // echo '<pre>';
        // print_r($acteur);   
        // echo '</pre>';
}

    public function realisateurs() {
        $realisateurs = $this->directorService->getAllDirectors();
        echo $this->twig->render('realisateurs.twig',["realisateurs"=>$realisateurs]);
        // require ('./src/view/realisateurs.php');
//         echo '<pre>';
//         print_r($realisateurs);   
//         echo '</pre>';
}

    public function realisateur($id) {
        $realisateur = $this->directorService->getbyId($id);
        echo $this->twig->render('realisateur.twig', ["realisateur"=>$realisateur]);
        // require ('./src/view/realisateur.php');
        // echo '<pre>';
        // print_r($realisateur);   
        // echo '</pre>';
}

    public function genres() {
        $genres = $this->genreService->getAllGenres();
        echo $this->twig->render('genres.twig',["genres" =>$genres]);
        // require ('./src/view/genres.php');
        // echo '<pre>';
        // print_r($genres);   
        // echo '</pre>';
}

    public function genre($id) {
        $genre = $this->genreService->getbyId($id);
        echo $this->twig->render('genre.twig',["genre" =>$genre]);
        // require ('./src/view/genre.php');
        // echo '<pre>';
        // print_r($genre);   
        // echo '</pre>';
}

    public function films() {
        $films = $this->movieService->getAllFilms();
        echo $this->twig->render('films.twig',["films" =>$films]);
        // require ('./src/view/films.php');     
        // echo '<pre>';
        // print_r($films);   
        // echo '</pre>';
}

    public function film($id) {
        $film = $this->movieService->getbyId($id);
        
        echo $this->twig->render('film.twig', ["film" =>$film]);
        //  require ('./src/view/film.php');
        // echo '<pre>';
        // print_r($film);   
        // echo '</pre>';
}

    public function addacteur() {
        echo $this->twig->render('f_acteur.twig');
        // require ('./src/view/f_acteur.php');
}

    public function addgenre() {
    echo $this->twig->render('f_genre.twig'); 
        // require './src/view/f_genre.php'; // formulaire de creation de genre.
 }

    public function addrealisateur() {
        echo $this->twig->render('f_realisateur.twig');
        // require ('./src/view/f_realisateur.php');
    }

    public function addfilm() {
        $reals = $this->directorService->getAllDirectors();
        // echo '<pre>';
        // print_r($reals);
        // echo '</pre>';
        $genres = $this->genreService->getAllGenres();
        // echo '<pre>';
        // print_r($genres);
        // echo '</pre>';
        // require ('./src/view/f_film.php');
        echo $this->twig->render('f_film.twig',["reals"=>$reals, "genres"=>$genres]);
    }

    public function modiffilm($id) {
        $film = $this->movieService->getbyId($id);
        $reals = $this->directorService->getAllDirectors();
        $genres = $this->genreService->getAllGenres();
       
        // require ('./src/view/modiffilm.php');
        echo $this->twig->render('modiffilm.twig',["film"=>$film, "reals"=>$reals, "genres"=>$genres]);
    }

    // public function modif_film() {
    //     require ('./src/view/modif_film.php');
    // }

    public function ajouteacteur($id) {
        $film = $this->movieService->getbyId($id);
        $acteurs = $this->actorService->getAllActors();
        require ('./src/view/add_acteur.php');
    }
}