<?php 

namespace cinema\model\entities;

class User {

    private $id_user;
    private $nom;
    private $prenom;
    private $email;
    private $password;
    private $role;

    public function  setId_user($id_user){
        $this->id_user = $id_user;
        return $this;
    }
    public function getId_user(){
        return $this->id_user;
    }

    public function  setLastName($nom){
        $this->nom = $nom;
        return $this;
    }
    public function getLastName(){
        return $this->nom;
    }

    public function  setFirstName($prenom){
        $this->prenom = $prenom;
        return $this;
    }

    public function getFirstName(){
        return $this->prenom;
    }
    public function  setEmail($email){
        $this->email = $email;
        return $this;
    }

    public function getemail(){
        return $this->email;
    }
    public function  setPassword($password){
        $this->password = $password;
        return $this;
    }

    public function getPassword(){
        return $this->password;
    }
    public function  setRole($role){
        $this->role = $role;
        return $this;
    }

    public function getRole(){
        return $this->role;
    }
}