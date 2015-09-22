<?php

/**
 * Created by PhpStorm.
 * User: wk222as
 * Date: 2015-09-21
 * Time: 13:50
 */
class LoginModel {

    //private $registeredUserName = "Admin";
    //private $registeredPassword = "Password";

    private static $folder = "RegisteredUsers";


    public function validateUserInput($user) {

        $filesInFolder = scandir(self::$folder);

        foreach ($filesInFolder as $fileName) {

            $userArray = explode("\n", $fileName);

            if ($userArray[0] === $user -> getUserName() &&
                $userArray[1] === $user -> getPassword()) {

                return true;

            } else {

                return false;
            }
        }

        /*if ($this -> registeredUserName === $user -> getUserName() &&
            $this -> registeredPassword === $user -> getPassword()) {

            return true;

        } else {

            return false;
        }*/
    }
}