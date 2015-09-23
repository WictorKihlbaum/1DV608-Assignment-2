<?php

/**
 * Created by PhpStorm.
 * User: wk222as
 * Date: 2015-09-23
 * Time: 12:25
 */
class LoginModel {

    private $sessionModel;
    
    private $registeredUserName = "Admin";
    private $registeredPassword = "Password";
    
    
    public function __construct($sessionModel) {
        
        $this -> sessionModel = $sessionModel;
    }

    public function validateUserInput($user) {
        
        if($this -> registeredUserName !== $user -> getUserName() || $this -> registeredPassword !== $user -> getPassword()) {
            
            throw new \Exception("Wrong name or password");
        }           
        $this -> sessionModel -> setUserSession();
    }
    public function logoutuser(){
        
        $this->sessionModel->unsetUserSession();
    }
    public function loggedinUser(){
        
        return $this->sessionModel->getUserSession();
    }
    
}