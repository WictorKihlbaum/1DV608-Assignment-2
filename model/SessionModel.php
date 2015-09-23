<?php



class SessionModel {
    
    private static $userSession = "SessionModel::UserSession";
    
    
    public function __construct() {
        
        session_start();
    }
    
    public function setUserSession() {
     
        $_SESSION[self::$userSession] = true;
    }
    
    public function unsetUserSession() {
        
        unset($_SESSION[self::$userSession]);
    }
    
    public function getUserSession() {
        
        if(isset($_SESSION[self::$userSession])){
            return $_SESSION[self::$userSession];
        }
            return false;
    }
}