<?php



class SessionModel {
    
    private static $userIsLoggedIn = "SessionModel::UserIsLoggedIn";
    
    
    public function __construct() {
        
        session_start();
    }
    
    public function setLoggedInSession() {
        
        $_SESSION[self::$userIsLoggedIn] = true;
    }
    
    public function unsetLoggedInSession() {
        
        unset($_SESSION[self::$userIsLoggedIn]);
    }
    
    public function getLoggedInSession() {
        
        return $_SESSION[self::$userIsLoggedIn];
    }
}