<?php

class CUtente
{

    static function login()
    {
        if ($_SERVER['REQUEST_METHOD'] == "GET") {
            if (static::isLogged()) {
                $pm = new FPersistentManager();
                $view = new VUtente();
                //$result = $pm->loadTrasporti();
                //$view->loginOk($result);
                $view->loginOk();
            } else {
                $view = new VUtente();
                $view->showFormLogin();
            }
        } elseif ($_SERVER['REQUEST_METHOD'] == "POST")
            static::verifica();
    }

    static function verifica()
    {
        $view = new VUtente();
        $pm = USingleton::getInstance('FPersistentManager');
        $utente = $pm->loadLogin($_POST['email'], $_POST['password']);
        //var_dump($utente);
        if ($utente != null && $utente->getBan() != true) {
            if (session_status() == PHP_SESSION_NONE) {
                $session = USingleton::getInstance('USession');
                $savableData = serialize($utente);
                $privilegi = $utente->getPrivilegi();
                $session->setValue('privilegi', $privilegi);
                $session->setValue('utente', $savableData);
                if ($privilegi == 1) { //accesso con privilegi base (utente)
                    if (isset($_COOKIE['home']))
                        setcookie('home', null, time() - 900, '/');
                    else
                        header('Location: /chefskiss/');
                } else { //accesso con privilegi maggiori (moderatore o amministratore)
                    header('Location: /chefskiss/Admin/homepage');
                }
            }
        } else {
            $view->loginErr();
        }
    }

    static function isLogged()
    {
        $check = false;
        if (isset($_COOKIE['PHPSESSID'])) {
            if (session_status() == PHP_SESSION_NONE) {
                USingleton::getInstance('USession');
            }
        }
        if (isset($_SESSION['utente'])) {
            $check = true;
        }
        return $check;
    }

    static function registrazione()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $view = new VUtente();
            if (self::isLogged()) {
                $view->loginOk();
            }
        } else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            self::verify_registration();
        }
    }

    static function logout()
    {
        $session = USingleton::getInstance('USession');
        $session->unsetSession();
        $session->destroySession();
        setcookie('PHPSESSID', '');
        header('Location: /ChefsKiss/chefskiss/');
    }

    static function verify_registration()
    {
        $pm = USingleton::getInstance('FPersistentManager');
        $verify_email = $pm::exist('email', $_POST['email'], 'FUtente');
        $view = new VUtente();
        if ($verify_email) {
            $view->registrationError('email');
        } else {
            $nome_utente = explode(' ', $_POST['username']);
            $utente = new EUtente($nome_utente[0], $nome_utente[1], time(), $_POST['email'], $_POST['password'], '', date('y/m/d'), null, false, 1);
            $pm::insert($utente);
            header('Location: /chefskiss/Utente/login');
        }
    }

    static function profilo()
    {
        $view = new VUtente();
        $session = USingleton::getInstance('USession');
        $utente = unserialize($session->readValue('utente'));
        $pm = USingleton::getInstance('FPersistentManager');
        if (CUtente::isLogged()) {
            $immagini_utente = $pm::load('FImmagine', array(['id', '=', $utente->getid_immagine()]));
            $ricetta = $pm::load('FRicetta', array(['autore', '=', $utente->getId()]));

            if($ricetta != null) {
                if(is_array($ricetta)){
                    for($i = 0; $i < sizeof($ricetta); $i++){
                        $immagine[$i] = $pm::load('FImmagine', array(['id', '=', $ricetta[$i]->getId_immagine()]));
                        $autori_ricette[$i] = $pm::load('FUtente', array(['id', '=', $ricetta[$i]->getAutore()]));
                        $immagini_autori[$i] = $pm::load('FImmagine', array(['id', '=', $autori_ricette[$i]->getid_immagine()]));
                    }
                }
                else{
                    $immagine = $pm::load('FImmagine', array(['id', '=', $ricetta->getId_immagine()]));
                    $autori_ricette = $pm::load('FUtente', array(['id', '=', $ricetta->getAutore()]));
                    $immagini_autori = $pm::load('FImmagine', array(['id', '=', $autori_ricette->getid_immagine()]));

            if ($ricetta != null) {
                for ($i = 0; $i < sizeof($ricetta); $i++) {
                    $immagine[$i] = $pm::load('FImmagine', array(['id', '=', $ricetta[$i]->getId_immagine()]));
                    $autori_ricette[$i] = $pm::load('FUtente', array(['id', '=', $ricetta[$i]->getAutore()]));
                    $immagini_autori[$i] = $pm::load('FImmagine', array(['id', '=', $autori_ricette[$i]->getid_immagine()]));

                }
                $view->profilo($ricetta, $utente, $immagine, $immagini_utente, $immagini_autori);
            } else $view->profilo($ricetta, $utente, $immagine = null, $immagini_utente, $immagini_autori = null);
        } else {
            header('Location: /chefskiss/Utente/login');
        }
    }

    static function cancellaRicetta($id, $id_imm ,$id_autore)
    {
        $pm = USingleton::getInstance('FPersistentManager');
        $session = USingleton::getInstance('USession');
        $utente = unserialize($session->readValue('utente'));

        if ($utente != null && $id_autore == $utente->getId() ) {
            $pm::delete('id', $id, 'FRicetta');
            $pm::delete('id', $id_imm, 'Fimmagine');

            header("Location: /chefskiss/Ricette/EsploraLeRicette");
        } else {
            header("Location: /chefskiss/Ricette/EsploraLeRicette");
        }


    }

}