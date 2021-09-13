<?php

class USession{

    public function __construct(){
        session_start();
    }

    public function setValue(String $key, $value){
        $_SESSION[$key] = $value;
    }

    public function destroyValue(String $key){
        unset($_SESSION[$key]);
    }

    public function readValue(String $key){
        if(isset($_SESSION[$key])){
            return $_SESSION[$key];
        }
        else return false;
    }

    public function unsetSession(){
        session_unset();
    }

    public function destroySession(){
        session_destroy();
    }

}


?>