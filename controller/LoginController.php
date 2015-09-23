<?php

/**
 * Created by PhpStorm.
 * User: wk222as
 * Date: 2015-09-23
 * Time: 12:23
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

                $user = $this -> loginView -> getUser();
                // Validate user's username/password in 'loginModel' and return true/false.
                return $this -> loginModel -> validateUserInput($user);
                
            } catch (\Exception $e) {

                echo $e -> getMessage();
            }
        }
    }
    
}