<?php

/**
 * Created by PhpStorm.
 * User: wk222as
 * Date: 2015-09-14
 * Time: 13:56
 */
require_once('model/UserModel.php');

class LoginController {

    private $loginView;
    private $loginModel;


    public function __construct($loginView, $loginModel) {

        $this -> loginView = $loginView;
        $this -> loginModel = $loginModel;
    }

    public function loginUser() {
        // Get user input if user pressed 'login'.
        if ($this -> loginView -> didUserPressLogin()) {

            $postedUserName = $this -> loginView -> getPostedUserName();
            $postedPassword = $this -> loginView -> getPostedPassword();

            $user = new UserModel($postedUserName, $postedPassword);
            // Validate user input in 'loginModel' and return true/false.
            return $this -> loginModel -> validateUserInput($user);
        }
    }

}