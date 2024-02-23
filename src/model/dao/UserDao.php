<?php 

namespace cinema\model\dao;

use cinema\model\entities\User;
use PDO;

    class UserDao extends BaseDao {

        
    public function createObjectFromFields($fields)
    {  
        // echo '<pre>';
        //       print_r($fields);die;
        $user = new User();

        $user->setId_user($fields['id_user'])
              ->setLastName($fields['nom'])
              ->setFirstName($fields['prenom'])    
              ->setEmail($fields['email']) 
              ->setPassword($fields['password'])
              ->setRole($fields['role']);  

            //   echo '<pre>';
            //   print_r($user);die;
        return $user;
    }

    public function create(User $user) {
        $stmt = $this->db->prepare("INSERT INTO user (nom, prenom, email, password, role) VALUES (:nom, :prenom, :email, :password, :role)");

        $hash = password_hash($user->getPassword(),PASSWORD_DEFAULT);

        $res = $stmt->execute([
            ':nom'=>$user->getLastName(),
            ':prenom'=>$user->getFirstName(),
            ':email' =>$user->getEmail(),
            ':password'=>$hash,
            ':role'=>$user->getRole(),
        ]);

        if (!$res) {
            throw new \PDOException($stmt->errorInfo()[2]);
        }
    }

    public function login($email, $password) {
      
        $stmt = $this->db->prepare('SELECT * FROM user WHERE email = :email');
        $stmt->bindParam(':email',$email,PDO::PARAM_STR);
        $stmt->execute([':email' => $email]);

        if($stmt->rowCount() == 1) {
            $user = $stmt->fetch();
            if(password_verify($password,$user['password'])) { 
                $_SESSION['user'] =  [
                    "nom" => $user["nom"],
                    "prenom" => $user["prenom"],
                    "id" => $user["id_user"],
                    "email" => $user["email"],
                    "role" => $user["role"]
                ];
                // echo '</pre>';
                // print_r($_SESSION['user']);die;
                return true;
            }
            else {
                return false;
            }
        }

    }
}

?>