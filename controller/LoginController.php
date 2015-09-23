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
    public function controlcheck(){
          if(!$this->loginModel->loggedinUser() && $this->loginView->didUserPressLogin()){
              
              $this->loginUser();
          }
          elseif($this->loginModel->loggedinUser() && $this->loginView->didUserPressLogout()){
              
              $this->logOutUser();
          }
          return $this->loginModel->loggedinUser();
    }
    public function loginUser() {
        // Get user input if user pressed 'login'.                
        $user = $this -> loginView -> getUser();
        
        try {
            if($user != null){
                $this -> loginModel -> validateUserInput($user);
                
                $this -> loginView -> setLoginFeedbackMessage();
            }
  
        } catch (\Exception $e) {
                $this -> loginView -> setWrongInputFeedbackMessage();
        }
    }
    
    public function logOutUser() {
        
        $this -> loginView -> setLogoutFeedbackMessage();
        
        $this -> loginModel -> logoutuser();
    }
    
}