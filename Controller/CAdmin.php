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
            $immagine = $pm::load('FImmagine', array(['id', '=', $utente->getid_immagine()]));
            $view->homepage($utente, $list, $immagine);
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
            $immagine = $pm::load('FImmagine', array(['id', '=', $utente->getid_immagine()]));
            $view->profiloUtente($utente, $immagine);
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
        $view = new VAdmin();
        $session = USingleton::getInstance('USession');
        $admin = unserialize($session->readValue('utente'));
        if ($admin != null && $admin->getPrivilegi() == 3) {
            $pm = USingleton::getInstance('FPersistentManager');
            $date = $view->getDate();
            date_default_timezone_set('Europe/Rome');
            $timezone = date_default_timezone_get();
            if (strtotime($date) > strtotime($timezone)) {
                $pm::update('data_fine_ban', $date, 'id', $id, 'FUtente');
                $pm::update('ban', 1, 'id', $id, 'FUtente');
                header("Location: /chefskiss/Admin/profiloUtente/$id");
            } else {
                header("Location: /chefskiss/Admin/profiloUtente/$id");
            }
        }
        else {
                header('Location: /chefskiss/');
            }

        }

        static function rimuoviBan($id)
        {
            $session = USingleton::getInstance('USession');
            $admin = unserialize($session->readValue('utente'));
            if ($admin != null && $admin->getPrivilegi() == 3) {
                $pm = USingleton::getInstance('FPersistentManager');
                $pm::update('ban', 0, 'id', $id, 'FUtente');
                $pm::update('data_fine_ban', null, 'id', $id, 'FUtente');

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