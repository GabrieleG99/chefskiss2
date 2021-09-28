<?php

class CForum
{
    static function esploraLeDomande($index=null, $filtro=''){

        if ($index == null) $new_index = 1;
        else $new_index = $index;

        $pm = USingleton::getInstance('FPersistentManager');

        $num_post = $pm::getRows('FPost');
        $immagini = array();

        if ($num_post % 5 != 0){
            $page_number = floor($num_post / 5 + 1);
        } else {
            $page_number = $num_post / 5;
        }

        if ($new_index * 5 <= $num_post){
            $post_pag = $pm::load('FPost', array(['id', '>', ($new_index - 1) * 5]), '', 5);
        } else {
            $limite = $num_post % 5;
            $post_pag = $pm::load('FPost', array(['id', '>', $new_index * 5 - 5]), '', $limite);
        }

        if (is_array($post_pag)) {
            for ($i = 0; $i < sizeof($post_pag); $i++) {
                $immagini[$i] = $pm::load('FImmagine', array(['id', '=', $post_pag[$i]->getId_immagine()]));
            }
        } else {
            $immagini = $pm::load('FImmagine', array(['id', '=', $post_pag->getId_immagine()]));
        }

        $view = new VForum();

        $view->showForum($post_pag, $page_number, $new_index, $num_post, $immagini);
    }

    static function InfoPost(int $id){
        $view = new VForum();
        $pm = USingleton::getInstance('FPersistentManager');
        $session = USingleton::getInstance('USession');
        $session->setValue('id_post', $id);
        $post = $pm::load('FPost', array(['id', '=', $id]));
        $autore = $pm::load('FUtente', array(['id', '=', $post->getAutore()]));
        $immagine = $pm::load('FImmagine', array(['id', '=',$post->getId_immagine()]));
        $commento = $pm::load('FCommento', array(['id_post', '=', $id]));
        if (is_array($commento)){
            for ($i = 0; $i < sizeof($commento); $i++){
                $commento_info[$i] = $commento[$i];
                $autori_commenti[$i] = $pm::load('FUtente', array(['id', '=', $commento[$i]->getAutore()]));
                $array = array($commento_info, $autori_commenti);
            }
            $view->showInfo($post, $autore, $immagine, $array);
        } elseif ($commento != null){
            $commento_info = $commento;
            $autori_commenti = $pm::load('FUtente', array(['id', '=', $commento->getAutore()]));
            $array = array($commento_info, $autori_commenti);
            $view->showInfo($post, $autore, $immagine, $array);
        }

        else $view->showInfo($post, $autore, $immagine, $array=null);
    }

    static function InserisciCommento(){
        $pm = USingleton::getInstance('FPersistentManager');
        $session = USingleton::getInstance('USession');
        if (CUtente::isLogged()){
            $id_post = intval($session->readValue('id_post'));
            $utente = unserialize($session->readValue('utente'));
            $text = $_POST['text_comment'];
            $post = new ECommento($id_post, $utente->getId(), $text, date('Y-m-d'));
            $pm::insert($post);
            $session->destroyValue('id_post');
            header("Location: /chefskiss/Forum/InfoPost/$id_post");
        } else {
            header('Location: /chefskiss/Utente/login');
        }
    }

    static function cerca($categoria=null){
        $pm = USingleton::getInstance('FPersistentManager');
        $view = new VForum();
        if($categoria!=null){
            $post = $pm::load('FPost', array(['categoria', '=', $categoria]));
            self::esploraLeDomande($index=null, $post);
        }
        else{
            $parametro = $_POST['text'];
            $parametro = strtoupper($parametro);
            $post = $pm::load('FPost', array(['nome_ricetta', '=', $parametro]));
            $id = $post->getId();
        }
    }
}