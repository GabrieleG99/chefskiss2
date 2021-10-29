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
            $post = $pm::load('FPost', array(['id', '>', $id]));
            if($post != null){
                if(is_array($post)){
                    for($i = 0; $i < sizeof($post); $i++){
                        $pm::update('id', $post[$i]->getid() - 1, 'id', $post[$i]->getid(), 'FPost');
                    }
                }
                else $pm::update('id', $post->getid() - 1, 'id', $post->getid(), 'FPost');
            }
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