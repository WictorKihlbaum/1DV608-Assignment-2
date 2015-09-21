<?php

/**
 * Created by PhpStorm.
 * User: wk222as
 * Date: 2015-09-14
 * Time: 13:56
 */
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

            try {

                $postedUserName = $this -> loginView -> getPostedUserName();
                $postedPassword = $this -> loginView -> getPostedPassword();

                $user = new UserModel($postedUserName, $postedPassword);
                // Validate user input in 'loginModel' and return true/false.
                return $this -> loginModel -> validateUserInput($user);

            } catch (Exception $e) {

                $errorMessage = $e -> getMessage();
                echo $errorMessage;
                //var_dump($e->getMessage());
            }
        }
    }

}