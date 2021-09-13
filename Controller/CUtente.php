<?php

class CUtente
{

    static function login (){
        if($_SERVER['REQUEST_METHOD']=="GET"){
            if(static::isLogged()) {
                $pm = new FPersistentManager();
                $view = new VUtente();
                //$result = $pm->loadTrasporti();
                //$view->loginOk($result);
                $view->loginOk();
            }
            else{
                $view=new VUtente();
                $view->showFormLogin();
            }
        }elseif ($_SERVER['REQUEST_METHOD']=="POST")
            static::verifica();
    }

    static function verifica(){
        $view = new VUtente();
        $pm = USingleton::getInstance('FPersistentManager');
        $utente = $pm->loadLogin($_POST['email'], $_POST['password']);
        var_dump($utente);
        if ($utente != null && $utente->getBan() != true){
            if (session_status() == PHP_SESSION_NONE){
                $session = USingleton::getInstance('USession');
                $savableData = serialize($utente);
                $privilegi = $utente->getPrivilegi();
                $session->setValue('privilegi', $privilegi);
                $session->setValue('utente', $savableData);
                if ($privilegi == 1){ //accesso con privilegi base (utente)
                    if (isset($_COOKIE['home']))
                        setcookie('home', null, time() - 900, '/');
                    else
                        header('Location: /chefskiss/');
                }
                else { //accesso con privilegi maggiori (moderatore o amministratore)
                    header('Location: /chefskiss/Admin/homepage');
                }
            }
        } else {
            $view->loginErr();
        }
    }

    static function isLogged(){
        $check = false;
        if (isset($_COOKIE['PHPSESSID'])){
            if (session_status() == PHP_SESSION_NONE){
                USingleton::getInstance('USession');
            }
        }
        if (isset($_SESSION['utente'])){
            $check = true;
        }
        return $check;
    }

    static function registrazione(){
        if ($_SERVER['REQUEST_METHOD'] == 'GET'){
            $view = new VUtente();
            if (self::isLogged()){
                $view->loginOk();
            }
        } else if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            self::verify_registration();
        }
    }

    static function logout(){
        $session = USingleton::getInstance('USession');
        $session->unsetSession();
        $session->destroySession();
        setcookie('PHPSESSID', '');
        header('Location: /ChefsKiss/chefskiss/');
    }

    static function verify_registration(){
        $pm = USingleton::getInstance('FPersistentManager');
        $verify_email = $pm::exist('email', $_POST['email'], 'FUtente');
        $view = new VUtente();
        if ($verify_email){
            $view->registrationError('email');
        } else {
            $nome_utente = explode(' ', $_POST['username']);
            $utente = new EUtente($nome_utente[0], $nome_utente[1], time(), $_POST['email'], $_POST['password'], '', date('y/m/d'), null, false, 1);
            $pm::insert($utente);
            header('Location: /chefskiss/Utente/login');
        }
    }
}