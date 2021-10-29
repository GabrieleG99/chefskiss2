<?php

class CRicette
{

    static function esplora($id=null){
        $view = new VRicette();
        $pm = USingleton::getInstance('FPersistentManager');

        if ($id != null){
            $ricetta = $pm::load('FRicetta', array(['id', '=', $id]));
            $array = self::homeRicette($ricetta);
            $view->showRecepies($ricetta, $array);
        } else {
            $ricette = $pm::load('FRicetta', array(), '', 3);
            $array = self::homeRicette($ricette);
            $view->showRecepies($ricette, $array);
        }
    }

    static function InfoRicetta(int $id){
        $view = new VRicette();
        $pm = USingleton::getInstance('FPersistentManager');
        $session = USingleton::getInstance('USession');
        $mod = unserialize($session->readValue('utente'));
        $session->setValue('id_ricetta', $id);
        $ricetta = $pm::load('FRicetta', array(['id', '=', $id]));
        $autore = $pm::load('FUtente', array(['id', '=', $ricetta->getAutore()]));
        $immagine = $pm::load('FImmagine', array(['id', '=', $ricetta->getId_immagine()]));
        $immagini_autore = $pm::load('FImmagine', array(['id', '=', $autore->getid_immagine()]));
        $recensione = $pm::load('FRecensione', array(['id_ricetta', '=', $id]));
        if(is_array($recensione)){
            for ($i = 0; $i < sizeof($recensione); $i++){
                $recensioni_info[$i] = $recensione[$i];
                $autori_recensioni[$i] = $pm::load('FUtente', array(['id', '=', $recensione[$i]->getAutore()]));
                $immagini_autore_recensione[$i] = $pm::load('FImmagine', array(['id', '=', $autori_recensioni[$i]->getid_immagine()]));
                $array = array($recensioni_info, $autori_recensioni, $immagini_autore_recensione);
            }
            $view->showInfo($ricetta, $autore,$mod, $immagine, $array, $immagini_autore);
        }
        elseif($recensione != null){
            $recensioni_info = $recensione;
            $autori_recensioni = $pm::load('FUtente', array(['id', '=', $recensione->getAutore()]));
            $immagini_autore_recensione = $pm::load('FImmagine', array(['id', '=', $autori_recensioni->getid_immagine()]));
            $array = array($recensioni_info, $autori_recensioni, $immagini_autore_recensione);
            $view->showInfo($ricetta, $autore,$mod, $immagine, $array, $immagini_autore);
        }

        else $view->showInfo($ricetta, $autore,$mod, $immagine, $array=null, $immagini_autore);
    }

    static function homeRicette($ricette){
        $pm = USingleton::getInstance('FPersistentManager');
        if($ricette!=null){
            if(is_array($ricette)){
                for ($i = 0; $i < count($ricette); $i++){
                    $ricette_home[$i] = $ricette[$i];
                    $autori_ricette[$i] = $pm::load('FUtente', array(['id', '=', $ricette[$i]->getAutore()]));
                    $immagini_home[$i] = $pm::load('FImmagine', array(['id', '=', $ricette[$i]->getId_immagine()]));
                    $immagini_autore[$i] = $pm::load('FImmagine', array(['id', '=', $autori_ricette[$i]->getid_immagine()]));
                }
            }
            else{
                $ricette_home = $ricette;
                $autori_ricette = $pm::load('FUtente', array(['id', '=', $ricette->getAutore()]));
                $immagini_home = $pm::load('FImmagine', array(['id', '=', $ricette->getId_immagine()]));
                $immagini_autore = $pm::load('FImmagine', array(['id', '=', $autori_ricette->getid_immagine()]));
            }
        }
        return array($ricette_home, $autori_ricette, $immagini_home, $immagini_autore);
    }

    static function EsploraLeRicette($cerca=null, $index=null){

        $ricette_per_pagina = 5;

        if ($cerca == null && isset($_COOKIE['searchOn'])) {
            if ($_COOKIE['searchOn'] == 1) self::searchOff();
        }

        if ($index == null) $new_index = 1;
        else $new_index = $index;

        $pm = USingleton::getInstance('FPersistentManager');
        if (isset($_COOKIE['ricetta_ricerca'])) $data = unserialize($_COOKIE['ricetta_ricerca']);

        if (!isset($_COOKIE['ricetta_ricerca']) || !is_array($data)) {
            $num_ricette = $pm::getRows('FRicetta');
        } else {
            if (isset($data['nome_ricetta']) || isset($data['id'])){
                $num_ricette = 1;
            } elseif (is_array($data[0])){
                $num_ricette = sizeof($data);
            } else {
                echo 'Non sono presenti risultati';
            }
        }

        $immagini = array();

        if ($num_ricette % $ricette_per_pagina != 0){
            $page_number = floor($num_ricette / $ricette_per_pagina + 1);
        } else {
            $page_number = $num_ricette / $ricette_per_pagina;
        }

        if (!isset($_COOKIE['ricetta_ricerca']) || !is_array($data)) {
            if ($new_index * $ricette_per_pagina <= $num_ricette) {
                $ricette_pag = $pm::load('FRicetta', array(['id', '>', ($new_index - 1) * $ricette_per_pagina]), '', $ricette_per_pagina);
            } else {
                $limite = $num_ricette % $ricette_per_pagina;
                $ricette_pag = $pm::load('FRicetta', array(['id', '>', $new_index * $ricette_per_pagina - $ricette_per_pagina]), '', $limite);
            }

            if (is_array($ricette_pag)) {
                for ($i = 0; $i < sizeof($ricette_pag); $i++) {
                    $immagini[$i] = $pm::load('FImmagine', array(['id', '=', $ricette_pag[$i]->getId_immagine()]));
                }
            } else {
                $immagini = $pm::load('FImmagine', array(['id', '=', $ricette_pag->getId_immagine()]));
            }
        } else {
            if ($new_index * 5 <= $num_ricette){
                for ($i = 0; $i < 5; $i++) {
                    $ricette_pag[] = $pm::load('FRicetta', array(['id', '=', $data[$i]['id']]));
                }
            } else {
                if (isset($data['nome_ricetta'])){
                    $ricette_pag = $pm::load('FRicetta', array(['id', '=', $data['id']]));
                } else if (is_array($data[0])){
                    for ($i = 0; $i < count($data); $i++) {
                        $ricette_pag[] = $pm::load('FRicetta', array(['id', '=', $data[$i]['id']]));
                    }
                }
            }
            if (is_array($ricette_pag)) {
                for ($i = 0; $i < sizeof($ricette_pag); $i++) {
                    $immagini[$i] = $pm::load('FImmagine', array(['id', '=', $ricette_pag[$i]->getId_immagine()]));
                }
            } else {
                $immagini = $pm::load('FImmagine', array(['id', '=', $ricette_pag->getId_immagine()]));
            }
        }
        $view = new VRicette();
        
        $cerca = 'cerca';

        $view->showAll($ricette_pag, $page_number, $new_index, $num_ricette, $immagini, $cerca);
    }

    static function searchOff(){
        setcookie('searchOn', 0);
        setcookie('ricetta_ricerca', '');
        header('Location: /chefskiss/Ricette/EsploraLeRicette');
    }

    static function InserisciRecensione(){
        $pm = USingleton::getInstance('FPersistentManager');
        $session = USingleton::getInstance('USession');
        if(CUtente::isLogged()){
            $id_ricetta = intval($session->readValue('id_ricetta'));
            $utente = unserialize($session->readValue('utente'));
            $ricetta = $pm::load('FRicetta', array(['id', '=', $id_ricetta]));
            if(self::hasVoted($utente->getId(), $id_ricetta)){
                $text = $_POST['text_comment'];
                $voto = intval($_POST['star']);
                $recensione = new ERecensione($text, $voto, $id_ricetta, date('Y-m-d'), $utente->getId());
                $pm::insert($recensione);
                $session->destroyValue('id_ricetta');
                header("Location: /chefskiss/Ricette/InfoRicetta/$id_ricetta");
            }
            else{ //l'utente ha già votato
                $text = $_POST['text_comment'];
                $voto = 0;
                $recensione = new ERecensione($text, $voto, $id_ricetta, date('Y-m-d'), $utente->getId());
                $pm::insert($recensione);
                $session->destroyValue('id_ricetta');
                header("Location: /chefskiss/Ricette/InfoRicetta/$id_ricetta");
            }
        }
        else{
            header('Location: /chefskiss/Utente/login');
        }
    }

    static function hasVoted($user_id, $recipe_id){
        $pm = USingleton::getInstance('FPersistentManager');
        $check = true;
        $recensioni = $pm::load('FRecensione', array(['id_ricetta', '=', $recipe_id]));
        if(is_array($recensioni)){
            for ($i = 0; $i < count($recensioni); $i++){
                if($recensioni[$i]->getValutazione() > 0 && $recensioni[$i]->getAutore() == $user_id) $check = false;
            }
        }
        elseif($recensioni!=null && $recensioni->getValutazione() > 0 && $recensioni->getAutore() == $user_id) $check = false;
        return $check;
    }

    static function cerca($categoria=null){
        $pm = USingleton::getInstance('FPersistentManager');
        if($categoria!=null){
            $ricette = $pm::load('FRicetta', array(['categoria', '=', $categoria]));
            if (is_array($ricette)){
                for($i = 0; $i < sizeof($ricette); $i++){
                    $array[$i]['nome_ricetta'] = $ricette[$i]->getNomeRicetta();
                    $array[$i]['id'] = $ricette[$i]->getId();
                }
            }
            else {
                $array['nome_ricetta'] = $ricette->getNomeRicetta();
                $array['id'] = $ricette->getId();
            }
            $data = serialize($array);
            setcookie('ricetta_ricerca', $data);
            setcookie('searchOn', 1);
            header('Location: /chefskiss/Ricette/EsploraLeRicette/cerca');
        }
        else{
            $j = 0;
            $parametro = $_POST['text'];
            $parametro = strtoupper($parametro);
            $allPostTitleAndId = $pm::loadDefCol('FRicetta', array('nome_ricetta', 'id'));
            if (isset($allPostTitleAndId[0]) && is_array($allPostTitleAndId[0])) {
                for ($i = 0; $i < sizeof($allPostTitleAndId); $i++) {
                    if (is_int(strpos($allPostTitleAndId[$i]['nome_ricetta'], $parametro))){
                        $array[$j]['nome_ricetta'] = $allPostTitleAndId[$i]['nome_ricetta'];
                        $array[$j]['id'] = $allPostTitleAndId[$i]['id'];
                        $j += 1;
                    }
                }
            } elseif (isset($allPostTitleAndId['nome_ricetta'])){
                if (is_int(strpos($allPostTitleAndId['nome_ricetta'], $parametro))){
                    $array = $allPostTitleAndId;
                }
            }
            $data = serialize($array);
            setcookie('ricetta_ricerca', $data);
            setcookie('searchOn', 1);
            header('Location: /chefskiss/Ricette/EsploraLeRicette/cerca');
        }
    }

    static function nuovaRicetta(){
        $view = new VRicette();
        $view->showSubmitRecipe();
    }

    static function pubblicaRicetta(){
        $pm = USingleton::getInstance('FPersistentManager');
        $session = USingleton::getInstance('USession');
        if(CUtente::isLogged()){
            $id_immagine = self::upload();
            if($id_immagine!=false){
                $utente = unserialize($session->readValue('utente'));
                $autore = $utente->getId();
                $titolo = strtoupper($_POST['title']);
                $procedimento = $_POST['content'];
                $array = $_POST['ingredients'];
                $ingredienti = implode(", ", $array);
                $categoria = $_POST['recipe-type'];
                $dosi = $_POST['servings'];
                $id_ricette = $pm::loadDefCol('FRicetta', array('id'));
                if($id_ricette != null){
                    if(is_array($id_ricette)){
                        var_dump($id_ricette);
                        $id_ricetta = $id_ricette[count($id_ricette) - 1]['id'] + 1;
                    }
                    else $id_ricetta = 2;
                }
                $ricetta = new ERicetta($ingredienti, $procedimento, $categoria, date('Y-m-d'), $autore, $titolo, $dosi, $id_immagine, $valutazione=0);
                $ricetta->setId($id_ricetta);
                $pm::insert($ricetta);
                //$id_ricetta = $ricetta->getId();
                header("Location: /chefskiss/Ricette/InfoRicetta/$id_ricetta");
            }
            else; //errore caricamento immagine
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

    static function modificaRicetta($id_ricetta){
        $pm = USingleton::getInstance('FPersistentManager');
        $session = USingleton::getInstance('USession');
        $utente = unserialize($session->readValue('utente'));
        $ricetta = $pm::load('FRicetta', array(['id', '=', $id_ricetta]));
        if (CUtente::isLogged() && $utente->getid() == $ricetta->getAutore()){
            $immagine = $pm::load('FImmagine', array(['id', '=', $ricetta->getid_immagine()]));
            $view = new VRicette();
            $view->modificaRicette($ricetta, $immagine, $ricetta->parseIngredienti());
        }
        else header('Location: /chefskiss/Utente/login');
    }

    static function confermaModifiche($id, $id_image){
        $pm = USingleton::getInstance('FPersistentManager');
        if (CUtente::isLogged()) {
            $titolo = $_POST['title'];
            $procedimento = $_POST['content'];
            $array = $_POST['ingredients'];
            $ingredienti = implode(", ", $array);
            $categoria = $_POST['recipe-type'];
            $dosi = $_POST['servings'];
            $id_immagine = self::upload();
            if($id_immagine!=false){
                $pm::update('id_immagine', $id_immagine, 'id', $id, 'FRicetta');
                $pm::delete('id', $id_image, 'Fimmagine');
            }
            $pm::update('nome_ricetta', $titolo, 'id', $id, 'FRicetta');
            $pm::update('procedimento', $procedimento, 'id', $id, 'FRicetta');
            $pm::update('ingredienti', $ingredienti, 'id', $id, 'FRicetta');
            $pm::update('categoria', $categoria, 'id', $id, 'FRicetta');
            $pm::update('dosi_persone', $dosi, 'id', $id, 'FRicetta');
            header("Location: /chefskiss/Ricette/InfoRicetta/$id");
        } else {
            header('Location: /chefskiss/Utente/login');
        }
    }

}