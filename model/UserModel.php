<?php

/**
 * Created by PhpStorm.
 * User: wictor
 * Date: 2015-09-20
 * Time: 19:40
 */
class User {

    private $username;
    private $password;


    public function __construct($username, $password) {

        // Make sure both username and password are filled in.
       if (!empty($username)) {

           $this -> username = $username;

       } else {

           throw new \Exception("Username is not filled in");
       }

        if (!empty($password)) {

            $this -> password = $password;

        } else {

            throw new \Exception("Password is not filled in");
        }
    }

    public function getUserName() {

        return $this -> username;
    }

    public function getPassword() {

        return $this -> password;
    }

}