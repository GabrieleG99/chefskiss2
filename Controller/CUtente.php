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

                }
                $view->profilo($ricetta, $utente, $immagine, $immagini_utente, $immagini_autori);
            } else $view->profilo($ricetta, $utente, $immagine = null, $immagini_utente, $immagini_autori = null);
        } else {
            header('Location: /chefskiss/Utente/login');
        }
    }


    static function cancellaRicetta($id, $id_imm)
    {
        $pm = USingleton::getInstance('FPersistentManager');
        $session = USingleton::getInstance('USession');
        $utente = unserialize($session->readValue('utente'));
        if ($utente != null) {
            $ricetta = $pm::load('FRicetta', array(['id', '=', $id ]));

            if ($ricetta->getAutore() == $utente->getId()) {
                $pm::delete('id', $id, 'FRicetta');
                $pm::delete('id', $id_imm, 'Fimmagine');

                header("Location: /chefskiss/Ricette/EsploraLeRicette");
            } else {
                header("Location: /chefskiss/Ricette/EsploraLeRicette");
            }
        } else {
            header("Location: /chefskiss/Ricette/EsploraLeRicette");

        }
    }

    static function modificaProfilo(){
        $view = new VUtente();
        $session = USingleton::getInstance('USession');
        $utente = unserialize($session->readValue('utente'));
        $pm = USingleton::getInstance('FPersistentManager');
        if(CUtente::isLogged()){
            $immagini_utente = $pm::load('FImmagine', array(['id', '=', $utente->getid_immagine()]));
            $view->modificaProfilo($utente, $immagini_utente);
        }
        else{
            header('Location: /chefskiss/Utente/login');
        }
    }

    static function confermaModifiche(){
        $pm = USingleton::getInstance('FPersistentManager');
        $session = USingleton::getInstance('USession');
        if(CUtente::isLogged()){
            $id_immagine = self::upload();
            $utente = unserialize($session->readValue('utente'));
            $nome_utente = $_POST['nome'];
            $cognome_utente = $_POST['cognome'];
            $email_utente = $_POST['email'];
            $pm::update('email', $email_utente, 'id', $utente->getId(), 'FUtente');
            $pm::update('nome', $nome_utente, 'id', $utente->getId(), 'FUtente');
            $pm::update('cognome', $cognome_utente, 'id', $utente->getId(), 'FUtente');
            $utente->setEmail($email_utente);
            $utente->setNome($nome_utente);
            $utente->setCognome($cognome_utente);
            $session->destroyValue('utente');
            if($id_immagine!=false){
                $pm::update('id_immagine', $id_immagine, 'id', $utente->getId(), 'FUtente');
                $utente->setid_immagine($id_immagine);
                $session->setValue('utente', serialize($utente));
                header("Location: /chefskiss/Utente/profilo");
            }
            else{
                $session->setValue('utente', serialize($utente));
                header("Location: /chefskiss/Utente/profilo");
            }
        }
        else{
            header('Location: /chefskiss/Utente/login');
        }
    }

    static function upload(){
        $pm = USingleton::getInstance('FPersistentManager');
        $result = false;
        $max_size = 600000;
        $result = is_uploaded_file($_FILES['file']['tmp_name']);
        if (!$result){
          //echo "Impossibile eseguire l'upload.";
          return false;
        } else {
          $size = $_FILES['file']['size'];
        if ($size > $max_size){
            //echo "Il file è troppo grande.";
            return false;
        }
        $type = $_FILES['file']['type'];
        $nome = $_FILES['file']['name'];
        $immagine = file_get_contents($_FILES['file']['tmp_name']);
        $immagine = addslashes ($immagine);
        $image = new EImmagine($id=0, $nome, $size, $type, $immagine);
        $pm::insertMedia($image, 'file');
        return $image->getId();
        }
    }

}