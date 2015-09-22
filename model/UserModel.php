<?php

/**
 * Created by PhpStorm.
 * User: wictor
 * Date: 2015-09-20
 * Time: 19:40
 */
class UserModel {

    private $username;
    private $password;


    public function __construct($username, $password) {

        // Make sure both username and password are filled in.
        if (!empty($username)) {

            $this -> username = $username;

        } else {

            throw new \Exception("Username is missing");
        }

        if (!empty($password)) {

            $this -> password = $password;

        } else {

            throw new \Exception("Password is missing");
        }
    }

    public function getUserName() {

        return $this -> username;
    }

    public function getPassword() {

        return $this -> password;
    }

}