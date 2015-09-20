<?php

/**
 * Created by PhpStorm.
 * User: wk222as
 * Date: 2015-09-14
 * Time: 13:56
 */

class LoginController {

    private $user;
    private $loginView;


    public function __construct($user, $loginView) {

        $this -> user = $user;
        $this -> loginView = $loginView;
    }

    public function loginUser() {

        if ($this -> loginView -> didUserPressLogin()) {

            echo "TEST";

            $this -> validateUserNameInput();
        }
    }

    private function validateUserNameInput() {

        if ($this -> loginView -> getPostedUserName() != $this -> user -> getUserName()) {

            echo "TEST 2";

            //$this -> loginView -> response($this -> loginView -> );
        }
    }
}