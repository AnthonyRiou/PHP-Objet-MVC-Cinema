<?php

namespace cinema\model\dao;
use cinema\model\entities\Director;

class DirectorDao extends BaseDao {
    public function findAll() {
        $stmt = $this->db->prepare("SELECT * FROM realisateur ");
        $res = $stmt->execute();
        if ($res) {
            $directors = [];
            while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
                $directors[] = $this->createObjectFromFields($row);
            }
        
            
            return $directors;
            
        } else {
            throw new \PDOException($stmt->errorInfo()[2]);
        }
    }

    public function findById($id): Director
    {
        $stmt = $this->db->prepare("SELECT * FROM realisateur WHERE id_realisateur = :id");
        $res = $stmt->execute([':id' => $id]);
        if($res) {
            $row = $stmt->fetch(\PDO::FETCH_ASSOC);
            return $this->createObjectFromFields($row);
        } else {

             throw new \PDOException($stmt->errorInfo()[2]);
        }
    }

    public function findByMovie($id_movie) {
        $stmt = $this->db->prepare("SELECT realisateur.* FROM film INNER JOIN realisateur ON realisateur.id_realisateur = film.id_realisateur AND film.id_film = :id_movie");
        $res = $stmt->execute([':id_movie' => $id_movie]);
        $row = $stmt->fetch(\PDO::FETCH_ASSOC);
        return $this->createObjectFromFields($row);
    }

    public function createObjectFromFields($fields)
    {
        $director = new Director();
        $director->setId_realisateur($fields['id_realisateur'])
        ->setFirstName($fields['prenom'])
        ->setLastName($fields['nom'])
        ->setphoto($fields['photo']);
        return $director;
    }

    public function create(Director $realisateur) {
        $stmt = $this->db->prepare("INSERT INTO realisateur (nom, prenom) VALUES (:nom, :prenom)");

        $res = $stmt->execute([
            ':nom'=>$realisateur->getLastName(),
            ':prenom'=>$realisateur->getFirstName()]);

        if (!$res) {
            throw new \PDOException($stmt->errorInfo()[2]);
        }
    }
}