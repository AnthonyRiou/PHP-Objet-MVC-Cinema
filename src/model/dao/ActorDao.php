<?php
namespace cinema\model\dao;

use cinema\model\entities\Actor;

class ActorDao extends BaseDao {

    public function findAll() {
        $stmt = $this->db->prepare("SELECT * FROM acteur ");
        $res = $stmt->execute();

        if ($res) {
            $actors = [];
            while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {

                $actors[] = $this->createObjectFromFields($row);
            }
            return $actors;
        } else {
            throw new \PDOException($stmt->errorInfo()[2]);
        }
    }

      
    public function findById($id): Actor
    {
        $stmt = $this->db->prepare("SELECT * FROM acteur WHERE id_acteur = :id");
        $res = $stmt->execute([':id' => $id]);

        if($res) {
            $row = $stmt->fetch(\PDO::FETCH_ASSOC);
          return $this->createObjectFromFields($row);
        } else {
            throw new \PDOException($stmt->errorInfo()[2]);
        }
    }

    
    public function findByMovie($idf) {
        $stmt = $this->db->prepare("SELECT acteur.* FROM acteur,jouer WHERE acteur.id_acteur = jouer.id_acteur AND jouer.id_film = ?");
        $res = $stmt->execute([$idf]);

        if ($res) {
            $actors = [];
            while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {

                $actors[] = $this->createObjectFromFields($row);
            }
            return $actors;
        } else {
            throw new \PDOException($stmt->errorInfo()[2]);
        }
    }
    

    public function createObjectFromFields($fields)
    {  
        $acteur = new Actor();

        $acteur->setId_acteur($fields['id_acteur'])
              ->setFirstName($fields['prenom']) 
              ->setLastName($fields['nom'])  
              ->setPhoto($fields['photo']);      

        return $acteur;
    }

    public function create(Actor $acteur) {
        $stmt = $this->db->prepare("INSERT INTO acteur (nom, prenom) VALUES (:nom, :prenom)");

        $res = $stmt->execute([
            ':nom'=>$acteur->getLastName(),
            ':prenom'=>$acteur->getFirstName(),
        ]);

        if (!$res) {
            throw new \PDOException($stmt->errorInfo()[2]);
        }
    }
}
