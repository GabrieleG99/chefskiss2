<?php

class CUtente
{

    static function login()
    {
        if ($_SERVER['REQUEST_METHOD'] == "GET") {
            if (static::isLogged()) {
                $view = new VUtente();
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
        $utente = $pm->loadLogin(VUtente::getEmail(), VUtente::getPassword());
        //var_dump($utente);
        if ($utente != null) {
            if ($utente->getBan() != true) {
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
                $view->loginErr(1, '', $utente->getDataFineBan());
            }
        } else {
            $view->loginErr(0,'errore');
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
        header('Location: /chefskiss');
    }

    static function verify_registration()
    {
        $pm = USingleton::getInstance('FPersistentManager');
        $verify_email = $pm::exist('email', VUtente::getEmail(), 'FUtente');
        $view = new VUtente();
        if ($verify_email) {
            $view->registrationError('email');
        } else {
            $nome_utente = VUtente::getNome();
            $cognome_utente = VUtente::getUsername();
            $utente = new EUtente($nome_utente, $cognome_utente, time(), VUtente::getEmail(), VUtente::getPassword(), 29, date('y/m/d'), null, false, 1);
            $pm::insert($utente);
            header('Location: /chefskiss/Utente/login');
        }
    }

    static function profilo($idutente=null){
        $view = new VUtente();
        $session = USingleton::getInstance('USession');
        $pm = USingleton::getInstance('FPersistentManager');
        if($idutente == null){
            $utente = unserialize($session->readValue('utente'));
        } else $utente = $pm::load('FUtente', array(['id', '=', $idutente]));
        if (CUtente::isLogged() || $idutente!=null){
            $immagini_utente = $pm::load('FImmagine', array(['id', '=', $utente->getid_immagine()]));
            $ricetta = $pm::load('FRicetta', array(['autore', '=', $utente->getId()]));
            if ($ricetta != null) {
                if (is_array($ricetta)) {
                    for ($i = 0; $i < sizeof($ricetta); $i++) {
                        $immagine[$i] = $pm::load('FImmagine', array(['id', '=', $ricetta[$i]->getId_immagine()]));
                        $autori_ricette[$i] = $pm::load('FUtente', array(['id', '=', $ricetta[$i]->getAutore()]));
                        $immagini_autori[$i] = $pm::load('FImmagine', array(['id', '=', $autori_ricette[$i]->getid_immagine()]));
                    }
                } else {
                    $immagine = $pm::load('FImmagine', array(['id', '=', $ricetta->getId_immagine()]));
                    $autori_ricette = $pm::load('FUtente', array(['id', '=', $ricetta->getAutore()]));
                    $immagini_autori = $pm::load('FImmagine', array(['id', '=', $autori_ricette->getid_immagine()]));

                }
                $view->profilo($ricetta, $utente, $immagine, $immagini_utente, $immagini_autori, $idutente);
            } else $view->profilo($ricetta, $utente, $immagine = null, $immagini_utente, $immagini_autori = null, $idutente);
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
            $ricetta = $pm::load('FRicetta', array(['id', '=', $id]));
            if ($ricetta->getAutore() == $utente->getId()) {
                $pm::delete('id', $id, 'FRicetta');
                $pm::delete('id', $id_imm, 'FImmagine');
                $pm::delete('id_ricetta', $id, 'FRecensione' );
                $ricette = $pm::load('FRicetta', array(['id', '>', $id]));
                if($ricette != null){
                    if(is_array($ricette)){
                        for($i = 0; $i < sizeof($ricette); $i++){
                            $pm::update('id', $ricette[$i]->getid() - 1, 'id', $ricette[$i]->getid(), 'FRicetta');
                        }
                    }
                    else $pm::update('id', $ricette->getid() - 1, 'id', $ricette->getid(), 'FRicetta');
                }
                header("Location: /chefskiss/Ricette/EsploraLeRicette");
            } else {
                header("Location: /chefskiss/Ricette/EsploraLeRicette");
            }
        } else {
            header("Location: /chefskiss/Ricette/EsploraLeRicette");

        }
    }

    static function cancellaPost($id, $id_imm)
    {
        $pm = USingleton::getInstance('FPersistentManager');
        $session = USingleton::getInstance('USession');
        $utente = unserialize($session->readValue('utente'));
        if ($utente != null) {
            $post = $pm::load('FPost', array(['id', '=', $id]));

            if ($post->getAutore() == $utente->getId()) {
                $pm::delete('id', $id, 'FPost');
                $pm::delete('id', $id_imm, 'FImmagine');
                $pm::delete('id_post', $id, 'FCommento' );
                $post = $pm::load('FPost', array(['id', '>', $id]));
                if($post != null){
                    if(is_array($post)){
                        for($i = 0; $i < sizeof($post); $i++){
                            $pm::update('id', $post[$i]->getid() - 1, 'id', $post[$i]->getid(), 'FPost');
                        }
                    }
                    else $pm::update('id', $post->getid() - 1, 'id', $post->getid(), 'FPost');
                }
                header("Location: /chefskiss/Forum/EsploraLeDomande");
            } else {
                header("Location: /chefskiss/Forum/EsploraLeDomande");
            }
        } else {
            header("Location: /chefskiss/Forum/EsploraLeDomande");

        }
    }

    static function cancellaCommento($id)
    {
        $pm = USingleton::getInstance('FPersistentManager');
        $session = USingleton::getInstance('USession');
        $utente = unserialize($session->readValue('utente'));
        if ($utente != null) {
            $commento = $pm::load('FCommento', array(['id', '=', $id]));
            if ($commento != null && $commento->getAutore() == $utente->getId()) {
                $pm::delete('id', $id, 'FCommento');
                header("Location: /chefskiss/Forum/InfoPost/{$commento->getId_post()}");
            }
            else{ header("Location: /chefskiss/Forum/esploraLeDomande");}
        } else {
            header("Location: /chefskiss/Forum/esploraLeDomande");

        }
    }

    static function cancellaRecensione($id)
    {
        $pm = USingleton::getInstance('FPersistentManager');
        $session = USingleton::getInstance('USession');
        $utente = unserialize($session->readValue('utente'));
        if ($utente != null) {
            $recensione = $pm::load('FRecensione', array(['id', '=', $id]));
            if ($recensione != null && $recensione->getAutore() == $utente->getId()) {
                $pm::delete('id', $id, 'FRecensione');
                header("Location: /chefskiss/Ricette/InfoRicetta/{$recensione->getId_ricetta()}");
            }
            else{ header("Location: /chefskiss/Forum/esploraLeRicette");}
        } else {
            header("Location: /chefskiss/Forum/esploraLeRicette");

        }
    }



    static function modificaProfilo()
    {
        $view = new VUtente();
        $session = USingleton::getInstance('USession');
        $utente = unserialize($session->readValue('utente'));
        $pm = USingleton::getInstance('FPersistentManager');
        if (CUtente::isLogged()) {
            $immagini_utente = $pm::load('FImmagine', array(['id', '=', $utente->getid_immagine()]));
            $view->modificaProfilo($utente, $immagini_utente);
        } else {
            header('Location: /chefskiss/Utente/login');
        }
    }

    static function confermaModifiche()
    {
        $pm = USingleton::getInstance('FPersistentManager');
        $session = USingleton::getInstance('USession');
        $verify_email = $pm::exist('email', VUtente::getEmail(), 'FUtente');
        if (CUtente::isLogged()) {
                $id_immagine = self::upload();
                $utente = unserialize($session->readValue('utente'));
                $nome_utente = VUtente::getNome();
                $cognome_utente = VUtente::getCognome();
                if(!$verify_email){
                    $email_utente = VUtente::getEmail();
                    $pm::update('email', $email_utente, 'id', $utente->getId(), 'FUtente');
                    $utente->setEmail($email_utente);
                }
                $pm::update('nome', $nome_utente, 'id', $utente->getId(), 'FUtente');
                $pm::update('cognome', $cognome_utente, 'id', $utente->getId(), 'FUtente');
                $utente->setNome($nome_utente);
                $utente->setCognome($cognome_utente);
                $session->destroyValue('utente');
                if ($id_immagine != false) {
                    if ((int)$utente->getid_immagine() != 29) $pm::delete('id', $utente->getid_immagine(), 'FImmagine');
                    $pm::update('id_immagine', $id_immagine, 'id', $utente->getId(), 'FUtente');
                    $utente->setid_immagine($id_immagine);
                    $session->setValue('utente', serialize($utente));
                    header("Location: /chefskiss/Utente/profilo");
                } else {
                    $session->setValue('utente', serialize($utente));
                    header("Location: /chefskiss/Utente/profilo");
                }
            } else {
            header('Location: /chefskiss/Utente/login');
        }
    }

    static function upload()
    {
        $pm = USingleton::getInstance('FPersistentManager');
        $result = false;
        $max_size = 600000;
        $result = is_uploaded_file($_FILES['file']['tmp_name']);
        if (!$result) {
            //echo "Impossibile eseguire l'upload.";
            return false;
        } else {
            $size = $_FILES['file']['size'];
            if ($size > $max_size) {
                //echo "Il file è troppo grande.";
                return false;
            }
            $type = $_FILES['file']['type'];
            $nome = $_FILES['file']['name'];
            $immagine = file_get_contents($_FILES['file']['tmp_name']);
            $immagine = addslashes($immagine);
            $image = new EImmagine($id = 0, $nome, $size, $type, $immagine);
            $pm::insertMedia($image, 'file');
            return $image->getId();
        }
    }

}