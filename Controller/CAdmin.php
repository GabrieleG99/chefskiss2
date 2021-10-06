<?php

class CAdmin
{

    static function homepage()
    {
        $view = new VAdmin();
        $session = USingleton::getInstance('USession');
        $utente = unserialize($session->readValue('utente'));
        if ($utente != null && $utente->getPrivilegi() == 3) {
            $pm = USingleton::getInstance('FPersistentManager');
            $list = $pm::load('FUtente');
            
            $view->homepage($utente, $list);
        } else {
            header('Location: /chefskiss/');
        }

    }

    static function profiloUtente($id)
    {
        $view = new VAdmin();
        $pm = USingleton::getInstance('FPersistentManager');
        $session = USingleton::getInstance('USession');
        $admin = unserialize($session->readValue('utente'));
        if ($admin != null && $admin->getPrivilegi() == 3) {
            $utente = $pm::load('FUtente', array(['id', '=', $id]));
            $view->profiloUtente($utente);
        } else {
            header('Location: /chefskiss/');
        }


    }

    static function nuovoModeratore($id)
    {
        $pm = USingleton::getInstance('FPersistentManager');
        $session = USingleton::getInstance('USession');
        $admin = unserialize($session->readValue('utente'));
        if ($admin != null && $admin->getPrivilegi() == 3) {
            $pm::update('privilegi', 2, 'id', $id, 'FUtente');
            header("Location: /chefskiss/Admin/profiloUtente/$id");

        } else {
            header('Location: /chefskiss/');
        }

    }

    static function bannaUtente($id)
    {
        $session = USingleton::getInstance('USession');
        $admin = unserialize($session->readValue('utente'));
        if ($admin != null && $admin->getPrivilegi() == 3) {
            $pm = USingleton::getInstance('FPersistentManager');
            $pm::update('ban', 1, 'id', $id, 'FUtente');
            $date = $_POST['date'];
            $pm::update('data_fine_ban', $date, 'id', $id, 'FUtente');

            header("Location: /chefskiss/Admin/profiloUtente/$id");

        } else {
            header('Location: /chefskiss/');
        }

    }

    static function togliModeratore($id)
    {
        $session = USingleton::getInstance('USession');
        $admin = unserialize($session->readValue('utente'));
        if ($admin != null && $admin->getPrivilegi() == 3) {
            $pm = USingleton::getInstance('FPersistentManager');
            $utente = $pm::load('FUtente', array(['id', '=', $id]));
            if ($utente->getPrivilegi() == 2) {
                $pm::update('privilegi', 1, 'id', $id, 'FUtente');
            }
            header("Location: /chefskiss/Admin/profiloUtente/$id");

        } else {
            header('Location: /chefskiss/');
        }
    }


}