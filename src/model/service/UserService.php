<?php

namespace cinema\model\service;

use cinema\model\dao\UserDao;

class UserService {

    private $userDao;

    public function __construct() {
        $this->userDao = new UserDao();
    }

    public function create($userData) {
        $user = $this->userDao->createObjectFromFields($userData);
        // echo '<pre>';
        // print_r($userData);die;
        $this->userDao->create($user);
    }

    public function login($post) {   
        $email = $post['email'];
        $password = $post['password'];
        // echo '<pre>';
        // print_r($password);die;
      return ( $this->userDao->login($email, $password));
    }

    public function deconnexion() {
        session_unset();
        session_destroy();

    }

}

