<?php

/**
 * Created by PhpStorm.
 * User: wicto
 * Date: 2015-09-20
 * Time: 19:40
 */
class User {

    private $username = "Admin";
    private $password = "Password";


    public function __construct($username, $password) {

        $this -> username = $username;
        $this -> password = $password;
    }

    public function getUserName() {

        return $this -> username;
    }

    public function getPassword() {

        return $this -> password;
    }

}