<?php

class CModeratore
{

    static function rimuoviRicetta($id, $id_imm){

        $pm = USingleton::getInstance('FPersistentManager');
        $session = USingleton::getInstance('USession');
        $mod = unserialize($session->readValue('utente'));
        if ($mod != null && $mod->getPrivilegi() >= 2) {
            $pm::delete('id', $id, 'FRicetta');
            $pm::delete('id', $id_imm, 'Fimmagine');
            $pm::delete('id_ricetta', $id, 'FRecensione' );
            header("Location: /chefskiss/Ricette/EsploraLeRicette");
        } else {
            header("Location: /chefskiss/Ricette/EsploraLeRicette");
        }

    }
    static function rimuoviRecensione($id,$id_ricetta){

        $pm = USingleton::getInstance('FPersistentManager');
        $session = USingleton::getInstance('USession');
        $mod = unserialize($session->readValue('utente'));
        if ($mod != null && $mod->getPrivilegi() >= 2) {
            $pm::delete('id', $id, 'FRecensione');

            header("Location: /chefskiss/Ricette/InfoRicetta/$id_ricetta");
        } else {
            header("Location: /chefskiss/Ricette/EsploraLeRicette");
        }


    }
    static function rimuoviPost($id,$id_imm){

        $pm = USingleton::getInstance('FPersistentManager');
        $session = USingleton::getInstance('USession');
        $mod = unserialize($session->readValue('utente'));
        if ($mod != null && $mod->getPrivilegi() >= 2) {
            $pm::delete('id', $id, 'FPost');
            $pm::delete('id', $id_imm, 'Fimmagine');
            $pm::delete('id_post', $id, 'FCommento' );
            header("Location: /chefskiss/Forum/esploraLeDomande");
        } else {
            header("Location: /chefskiss/Forum/esploraLeDomande");
        }



    }
    static function rimuoviCommento($id,$id_post){

        $pm = USingleton::getInstance('FPersistentManager');
        $session = USingleton::getInstance('USession');
        $mod = unserialize($session->readValue('utente'));
        if ($mod != null && $mod->getPrivilegi() >= 2) {
            $pm::delete('id', $id, 'FCommento');

            header("Location: /chefskiss/Forum/InfoPost/$id_post");
        } else {
            header("Location: /chefskiss/Forum/esploraLeDomande");
        }


    }


}