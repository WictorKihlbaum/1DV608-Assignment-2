<?php

/**
 * Created by PhpStorm.
 * User: wk222as
 * Date: 2015-09-23
 * Time: 12:25
 */
class LoginModel {

    private $registeredUserName = "Admin";
    private $registeredPassword = "Password";


    public function validateUserInput($user) {

        if ($this -> registeredUserName === $user -> getUserName() &&
            $this -> registeredPassword === $user -> getPassword()) {

            return true;

        } else {

            return false;
        }
    }
}