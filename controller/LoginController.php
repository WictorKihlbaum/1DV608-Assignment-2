<?php

/**
 * Created by PhpStorm.
 * User: wk222as
 * Date: 2015-09-14
 * Time: 13:56
 */

class LoginController {

    private $loginView;


    public function __construct($loginView) {

        $this -> loginView = $loginView;
    }

    public function loginUser() {

        if ($this -> loginView -> didUserPressLogin()) {

            echo "TEST";
        }
    }

}