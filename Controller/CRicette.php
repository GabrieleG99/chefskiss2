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
        $session->setValue('id_ricetta', $id);
        $ricetta = $pm::load('FRicetta', array(['id', '=', $id]));
        $autore = $pm::load('FUtente', array(['id', '=', $ricetta->getAutore()]));
        $immagine = $pm::load('FImmagine', array(['id', '=', $ricetta->getId_immagine()]));
        $recensione = $pm::load('FRecensione', array(['id_ricetta', '=', $id]));
        if(is_array($recensione)){
            for ($i = 0; $i < sizeof($recensione); $i++){
                $recensioni_info[$i] = $recensione[$i];
                $autori_recensioni[$i] = $pm::load('FUtente', array(['id', '=', $recensione[$i]->getAutore()]));
                $array = array($recensioni_info, $autori_recensioni);
            }
            $view->showInfo($ricetta, $autore, $immagine, $array);
        }
        elseif($recensione != null){
            $recensioni_info = $recensione;
            $autori_recensioni = $pm::load('FUtente', array(['id', '=', $recensione->getAutore()]));
            $array = array($recensioni_info, $autori_recensioni);
            $view->showInfo($ricetta, $autore, $immagine, $array);
        }

        else $view->showInfo($ricetta, $autore, $immagine, $array=null);
    }

    static function homeRicette($ricette){
        //$ricette_home = array();
        //$immagini_home = array();
        //$autori_ricette = array();
        $pm = USingleton::getInstance('FPersistentManager');
        if($ricette!=null){
            if(is_array($ricette)){
                for ($i = 0; $i < count($ricette); $i++){
                    $ricette_home[$i] = $ricette[$i];
                    $autori_ricette[$i] = $pm::load('FUtente', array(['id', '=', $ricette[$i]->getAutore()]));
                    $immagini_home[$i] = $pm::load('FImmagine', array(['id', '=', $ricette[$i]->getId_immagine()]));
                }
            }
            else{
                $ricette_home = $ricette;
                $autori_ricette = $pm::load('FUtente', array(['id', '=', $ricette->getAutore()]));
                $immagini_home = $pm::load('FImmagine', array(['id', '=', $ricette->getId_immagine()]));
            }
        }
        return array($ricette_home, $autori_ricette, $immagini_home);
    }

    static function EsploraLeRicette($index=null, $ricette=''){

        if ($index == null) $new_index = 1;
        else $new_index = $index;

        $pm = USingleton::getInstance('FPersistentManager');

        $num_ricette = $pm::getRows('FRicetta');
        $immagini = array();

        if ($num_ricette % 5 != 0){
            $page_number = floor($num_ricette / 5 + 1);
        } else {
            $page_number = $num_ricette / 5;
        }

        if(!is_array($ricette)){
            if ($new_index * 5 <= $num_ricette){
                $ricette_pag = $pm::load('FRicetta', array(['id', '>', ($new_index - 1) * 5]), '', 5);
            } else {
                $limite = $num_ricette % 5;
                $ricette_pag = $pm::load('FRicetta', array(['id', '>', $new_index * 5 - 5]), '', $limite);
            }
            //var_dump($ricette_pag);
            for($i = 0; $i < count($ricette_pag); $i++){
                $immagini[$i] = $pm::load('FImmagine', array(['id', '=', $ricette_pag[$i]->getId_immagine()]));
            }
        }
        else{
            if ($new_index * 5 <= $num_ricette){
                for($i = 0; $i < count($ricette); $i++) $ricette_pag[$i] = $ricette[$i];
            } else {
                $stop = $num_ricette % 5 + 5;
                for($limite = $num_ricette % 5; $limite != $stop; $limite++) $ricette_pag[$limite] = $ricette[$limite];
            }

            for($i = 0; $i < count($ricette_pag); $i++){
                $immagini[$i] = $pm::load('FImmagine', array(['id', '=', $ricette_pag[$i]->getId_immagine()]));
            }
        }

        $view = new VRicette();

        $view->showAll($ricette_pag, $page_number, $new_index, $num_ricette, $immagini);
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
        $view = new VRicette();
        if($categoria!=null){
            $ricette = $pm::load('FRicetta', array(['categoria', '=', $categoria]));
            self::EsploraLeRicette($index=null, $ricette);
        }
        else{
            $parametro = $_POST['text'];
            $parametro = strtoupper($parametro);
            $ricette = $pm::load('FRicetta', array(['nome_ricetta', '=', $parametro]));
            $array = self::homeRicette($ricette);
            $view->showRecepies($ricette, $array);
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
                $titolo = $_POST['title'];
                $procedimento = $_POST['content'];
                $array = $_POST['ingredients'];
                $ingredienti = implode(", ", $array);
                $categoria = $_POST['recipe-type'];
                $dosi = $_POST['servings'];
                $ricetta = new ERicetta($ingredienti, $procedimento, $categoria, date('Y-m-d'), $autore, $titolo, $dosi, $id_immagine, $valutazione=0);
                $pm::insert($ricetta);
                $id_ricetta = $ricetta->getId();
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

}