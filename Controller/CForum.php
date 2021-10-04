<?php

class CForum
{
    static function esploraLeDomande($cerca=null, $index=null){

        if ($cerca == null && isset($_COOKIE['searchOn'])) {
            if ($_COOKIE['searchOn'] == 1) self::searchOff();
        }

        if ($index == null) $new_index = 1;
        else $new_index = $index;

        $pm = USingleton::getInstance('FPersistentManager');

        if (isset($_COOKIE['titoli_ricerca'])) $data = unserialize($_COOKIE['titoli_ricerca']);

        if (!isset($_COOKIE['titoli_ricerca']) || !is_array($data)) {
            $num_post = $pm::getRows('FPost');
        } else {
            if (isset($data['titolo']) || isset($data['id'])){
                $num_post = 1;
            } elseif (is_array($data[0])){
                $num_post = sizeof($data);
            } else {
                echo 'Non sono presenti risultati';
            }
        }

        $immagini = array();

        if ($num_post % 5 != 0){
            $page_number = floor($num_post / 5 + 1);
        } else {
            $page_number = $num_post / 5;
        }

        if (!isset($_COOKIE['titoli_ricerca']) || !is_array($data)) {
            if ($new_index * 5 <= $num_post) {
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
        } else {
            if ($new_index * 5 <= $num_post){
                for ($i = 0; $i < 5; $i++) {
                    $post_pag[] = $pm::load('FPost', array(['id', '=', $data[$i]['id']]));
                }
            } else {
                if (isset($data['titolo'])){
                    $post_pag = $pm::load('FPost', array(['id', '=', $data['id']]));
                } else if (is_array($data[0])){
                    for ($i = 0; $i < count($data); $i++) {
                        $post_pag[] = $pm::load('FPost', array(['id', '=', $data[$i]['id']]));
                    }
                }
            }
            if (is_array($post_pag)) {
                for ($i = 0; $i < sizeof($post_pag); $i++) {
                    $immagini[$i] = $pm::load('FImmagine', array(['id', '=', $post_pag[$i]->getId_immagine()]));
                }
            } else {
                $immagini = $pm::load('FImmagine', array(['id', '=', $post_pag->getId_immagine()]));
            }
        }

        $view = new VForum();

        $view->showForum($post_pag, $page_number, $new_index, $num_post, $immagini, $cerca);
    }

    static function searchOff(){
        setcookie('searchOn', 0);
        setcookie('titoli_ricerca', '');
        header('Location: /chefskiss/Forum/esploraLeDomande');
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
            $j = 0;
            $parametro = $_POST['text'];
            $parametro = strtoupper($parametro);
            $allPostTitleAndId = $pm::loadDefCol('FPost', array('titolo', 'id'));
            if (isset($allPostTitleAndId[0]) && is_array($allPostTitleAndId[0])) {
                for ($i = 0; $i < sizeof($allPostTitleAndId); $i++) {
                    if (is_int(strpos($allPostTitleAndId[$i]['titolo'], $parametro))){
                        $array[$j]['titolo'] = $allPostTitleAndId[$i]['titolo'];
                        $array[$j]['id'] = $allPostTitleAndId[$i]['id'];
                        $j += 1;
                    }
                }
            } elseif (isset($allPostTitleAndId['titolo'])){
                if (is_int(strpos($allPostTitleAndId['titolo'], $parametro))){
                    $array = $allPostTitleAndId;
                }
            }
            $data = serialize($array);
            setcookie('titoli_ricerca', $data);
            setcookie('searchOn', 1);
            header('Location: /chefskiss/Forum/esploraLeDomande/cerca');
        }
    }
}