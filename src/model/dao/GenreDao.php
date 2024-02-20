<?php

namespace cinema\model\dao;

use cinema\model\entities\Genre;

class GenreDao extends BaseDao {

    public function createObjectFromFields($row) {
        $genre = new Genre();
        $genre->setId_Genre($row['id_genre']);
        $genre->setNom_Genre($row['nom']);
        $genre->setPhoto($row['photo']);
        return $genre;
    }
    
    public function findAll() {
        $stmt = $this->db->prepare("SELECT * FROM genre ");
        $res = $stmt->execute();

        if ($res) {
            $genres = [];
            while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
                $genres[] = $this->createObjectFromFields($row);
            }
            return $genres;
        } else {
            throw new \PDOException($stmt->errorInfo()[2]);
        }
    }

    public function findById($id) {
        $stmt = $this->db->prepare("SELECT * FROM genre WHERE id_genre = :id");
        $res = $stmt->execute([':id' => $id]);

        if ($res) {
            $row = $stmt->fetch(\PDO::FETCH_ASSOC);
            return $this->createObjectFromFields($row);
        } else {
            throw new \PDOException($stmt->errorInfo()[2]);
        }
    }

    public function create(Genre $genre) {
        $stmt = $this->db->prepare("INSERT INTO genre (nom) VALUES (:nom)");
        $res = $stmt->execute([':nom'=>$genre->getNom_genre()]);
        if (!$res) {
            throw new \PDOException($stmt->errorInfo()[2]);
        }
    }

    public function findByMovie($id_movie) {
        $stmt = $this->db->prepare("SELECT genre.* FROM film INNER JOIN genre ON genre.id_genre = film.id_genre AND film.id_film = 2");
        $res = $stmt->execute();
        $row = $stmt->fetch(\PDO::FETCH_ASSOC);
        $g = $this->createObjectFromFields($row);
        return($g);     
    }
    
   

}