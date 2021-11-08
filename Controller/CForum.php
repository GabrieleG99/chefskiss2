<?php

class CForum
{
    static function esploraLeDomande($cerca=null, $index=null){

        $post_per_pagina = 5;

        // Verifica che sia attiva la ricerca, se la risposta è no esce dalla modalità cerca
        if ($cerca == null && isset($_COOKIE['searchOn'])) {
            if ($_COOKIE['searchOn'] == 1) self::searchOff();
        }

        // Controlla l'indice della pagina
        if ($index == null) $new_index = 1;
        else $new_index = $index;

        $pm = USingleton::getInstance('FPersistentManager');

        /**
         * Se è attiva la modalità ricerca, ricava i dati dei titoli e gli id dei post dal cookie.
         * Inoltre memorizza il numero di post che dovranno essere paginati.
         */

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

        if ($num_post % $post_per_pagina != 0){
            $page_number = floor($num_post / $post_per_pagina + 1);
        } else {
            $page_number = $num_post / $post_per_pagina;
        }

        /**
         * Va ad eseguire la paginazione
         */
        if (!isset($_COOKIE['titoli_ricerca']) || !is_array($data)) {
            if ($new_index * $post_per_pagina <= $num_post) {
                $post_pag = $pm::load('FPost', array(['id', '>', ($new_index - 1) * $post_per_pagina]), '', $post_per_pagina);
            } else {
                $limite = $num_post % $post_per_pagina;
                $post_pag = $pm::load('FPost', array(['id', '>', $new_index * $post_per_pagina - $post_per_pagina]), '', $limite);
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
        $mod = unserialize($session->readValue('utente'));
        $session->setValue('id_post', $id);
        $post = $pm::load('FPost', array(['id', '=', $id]));
        $autore = $pm::load('FUtente', array(['id', '=', $post->getAutore()]));
        $immagine = $pm::load('FImmagine', array(['id', '=',$post->getId_immagine()]));
        $immagini_autore = $pm::load('FImmagine', array(['id', '=', $autore->getid_immagine()]));
        $commento = $pm::load('FCommento', array(['id_post', '=', $id]));
        if (is_array($commento)){
            for ($i = 0; $i < sizeof($commento); $i++){
                $commento_info[$i] = $commento[$i];
                $autori_commenti[$i] = $pm::load('FUtente', array(['id', '=', $commento[$i]->getAutore()]));
                $immagini_autore_recensione[$i] = $pm::load('FImmagine', array(['id', '=', $autori_commenti[$i]->getid_immagine()]));
                $array = array($commento_info, $autori_commenti, $immagini_autore_recensione);
            }
            $view->showInfo($post, $autore,$mod, $immagine, $array, $immagini_autore);
        } elseif ($commento != null){
            $commento_info = $commento;
            $autori_commenti = $pm::load('FUtente', array(['id', '=', $commento->getAutore()]));
            $immagini_autore_recensione = $pm::load('FImmagine', array(['id', '=', $autori_commenti->getid_immagine()]));
            $array = array($commento_info, $autori_commenti, $immagini_autore_recensione);
            $view->showInfo($post, $autore,$mod, $immagine, $array, $immagini_autore);
        }
        else $view->showInfo($post, $autore,$mod, $immagine, $array=null, $immagini_autore);
    }

    static function InserisciCommento(){
        $pm = USingleton::getInstance('FPersistentManager');
        $session = USingleton::getInstance('USession');
        if (CUtente::isLogged()){
            $id_post = intval($session->readValue('id_post'));
            $utente = unserialize($session->readValue('utente'));
            $text = VForum::getTextComment();
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
            if (is_array($post)) {
                for ($i = 0; $i < sizeof($post); $i++) {
                    $array[$i]['titolo'] = $post[$i]->getTitolo();
                    $array[$i]['id'] = $post[$i]->getId();
                }
            } elseif($post != null) {
                $array['titolo']  = $post->getTitolo();
                $array['id'] = $post->getId();
            } else {
                $array = null;
            }
            $data = serialize($array);
            setcookie('titoli_ricerca', $data);
            setcookie('searchOn', 1);
            header('Location: /chefskiss/Forum/esploraLeDomande/cerca');
        }
        else{
            $j = 0;
            $parametro = VForum::getTextSearch();
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

    static function nuovaDomanda(){
        $view = new VForum();
        $view->showSubmitPost();
    }

    static function pubblicaDomanda(){
        $pm = USingleton::getInstance('FPersistentManager');
        $session = USingleton::getInstance('USession');
        if(CUtente::isLogged()){
            $id_immagine = self::upload();
            if($id_immagine!=false){
                $utente = unserialize($session->readValue('utente'));
                $autore = $utente->getId();
                $titolo = strtoupper(VForum::getPostTitle());
                $domanda = VForum::getPostContent();
                $categoria = VForum::getPostType();
                $id_posts = $pm::loadDefCol('FPost', array('id'));
                if($id_posts != null){
                    if(is_array($id_posts)){
                        $id_post = $id_posts[count($id_posts) - 1]['id'] + 1;
                    }
                    else $id_post = 2;
                }
                $post = new EPost($autore, $titolo, $domanda, $categoria, date('Y-m-d'), $id_immagine);
                $post->setId($id_post);
                $pm::insert($post);
                header("Location: /chefskiss/Forum/InfoPost/$id_post");
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

    static function modificaPost($id_post){
        $pm = USingleton::getInstance('FPersistentManager');
        $session = USingleton::getInstance('USession');
        $utente = unserialize($session->readValue('utente'));
        $post = $pm::load('FPost', array(['id', '=', $id_post]));
        if (CUtente::isLogged() && $utente->getid() == $post->getAutore()){
            $immagine = $pm::load('FImmagine', array(['id', '=', $post->getid_immagine()]));
            $view = new VForum();
            $view->modificaPost($post, $immagine);
        }
        else header('Location: /chefskiss/Utente/login');
    }

    static function confermaModifiche($id, $id_image){
        $pm = USingleton::getInstance('FPersistentManager');
        if (CUtente::isLogged()) {
            $titolo = strtoupper(VForum::getPostTitle());
            $domanda = VForum::getPostContent();
            $categoria = VForum::getPostType();
            $id_immagine = self::upload();
            if($id_immagine!=false){
                $pm::update('id_immagine', $id_immagine, 'id', $id, 'FPost');
                $pm::delete('id', $id_image, 'Fimmagine');
            }
            $pm::update('titolo', $titolo, 'id', $id, 'FPost');
            $pm::update('domanda', $domanda, 'id', $id, 'FPost');
            $pm::update('categoria', $categoria, 'id', $id, 'FPost');
            header("Location: /chefskiss/Forum/InfoPost/$id");
        } else {
            header('Location: /chefskiss/Utente/login');
        }
    }
}