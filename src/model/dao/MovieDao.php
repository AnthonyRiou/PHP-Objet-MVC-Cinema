<?php

namespace cinema\model\dao;

use cinema\model\entities\Movie;

class MovieDao extends BaseDao {

    public function findAll() {
        $stmt = $this->db->prepare("SELECT *  FROM film");
        $res = $stmt->execute();

        if ($res) {
            $movies = [];
            while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
                $movies[] = $this->createObjectFromFields($row);
            }
            return $movies;
            
        } else {
            throw new \PDOException($stmt->errorInfo()[2]);
        }

        return $movies;
    }
    
    public function findById($id): Movie {
        $stmt = $this->db->prepare("SELECT *  FROM film WHERE id_film = :id");
        $res = $stmt->execute([':id' => $id]);

        if($res) {
            $row = $stmt->fetch(\PDO::FETCH_ASSOC);
            return $this->createObjectFromFields($row);
        } else {
            throw new \PDOException($stmt->errorInfo()[2]);
        }
    }
    
    public function createObjectFromFields($fields) {
    $movie = new Movie();
    
    $movie->setId_film($fields['id_film'])
    ->setTitre($fields['titre']) 
    ->setDate_de_sortie($fields['date_de_sortie']) 
    ->setAffiche($fields['affiche']);
        return $movie;
    }

    public function create(Movie $movie) { 
        $stmt = $this->db->prepare("INSERT INTO film (titre, date_de_sortie, affiche, id_realisateur, id_genre) VALUES (:titre, :date_de_sortie, :affiche, :id_realisateur, :id_genre)");

    $res = $stmt->execute([     
        ':titre'=>$movie->getTitre(),
        ':date_de_sortie'=>$movie->getDate_de_sortie(),
        ':affiche'=>$movie->getAffiche(),
        ':id_realisateur'=>$movie->getDirector()->getId_realisateur(),
        ':id_genre'=>$movie->getGenre()->getId_genre(),
    ]);  
    }

    public function update($id,$movie) {

        $stmt = $this->db->prepare("UPDATE film SET titre = :titre, date_de_sortie = :date_de_sortie, affiche = :affiche, id_realisateur = :id_real, id_genre = :id_genre WHERE id_film = :id_film");
      
        $res = $stmt->execute([
            ':titre'=>$movie->getTitre(),
            ':date_de_sortie'=>$movie->getDate_de_sortie(),
            ':affiche'=>$movie->getAffiche(),
            ':id_real'=>$movie->getDirector()->getId_realisateur(),
            ':id_genre'=>$movie->getGenre()->getId_genre(),
            ':id_film'=>$id
        ]);   
}

    public function addActeur($acteur) {
// // print_r($acteur['id_acteur']);
// // print_r($acteur['id_film']);die();
     
       $stmt =$this->db->prepare("SELECT * FROM jouer WHERE jouer.id_film = :id_film AND jouer.id_acteur = :id_acteur");
       $res = $stmt-> execute([
        ':id_film'=>$acteur['id_film'],
        ':id_acteur'=>$acteur['id_acteur']
       ]);
       $res = $stmt -> fetchALL(\PDO::FETCH_ASSOC); 


       
       if($res) {
        echo "l'acteur est déja présent au casting de ce film"; }
        else {
        $stmt = $this->db->prepare("INSERT INTO jouer (id_acteur, id_film) VALUES (:id_acteur, :id_film)");
        $res = $stmt->execute([
            ':id_acteur'=>$acteur['id_acteur'],
            ':id_film'=>$acteur['id_film']
        ]);
        echo "l'acteur a été ajouté au casting de ce film"; }
       }


    public function getMoviesByActor($idact) {
        $stmt = $this->db->prepare("SELECT *  FROM film INNER JOIN jouer ON film.id_film = jouer.id_film WHERE jouer.id_acteur  = :idact ");
        $res = $stmt->execute([
            ":idact" => $idact 
        ]);

        if ($res) {
            $movies = [];
            while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
                $movies[] = $this->createObjectFromFields($row);
            }
            return $movies;
            
        } else {
            throw new \PDOException($stmt->errorInfo()[2]);
        }

        return $movies;
    }


} 
        // $stmt = $this->db->prepare('
        // SELECT * FROM jouer
        // WHERE jouer.id_film = (:id_film)
        // AND jouer.id_acteur = (:id_acteur)');
        // $stmt->execute([
        //     ':id_film'=>$acteur['id_film'],
        //     ':id_acteur'=>$acteur['id_acteur'],
        // ]);
        // $res = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        // // $print_r($res);die;
        
        // if($res == null) {
        // $stmt2 = $this->db->prepare("INSERT INTO jouer (id_film, id_acteur) VALUES (:id_film, :id_acteur)");
        
        // $res2 = $stmt2->execute([
        //     ':id_film'=>$acteur['id_film'],
        //     ':id_acteur'=>$acteur['id_acteur'],
        // ]);
        // echo("Cet acteur a été ajouté au casting du film !!!");

        // } else {
        //     echo("Cet acteur est déjà dans le film !!! RELIS TON CASTING CONNARD !!!");die;
            
        // };
