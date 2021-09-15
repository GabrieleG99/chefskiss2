<?php

class CRicette
{

    static function esplora(){
        $view = new VRicette();
        $pm = USingleton::getInstance('FPersistentManager');

        $ricette = $pm::load('FRicetta');

        $array = self::homeRicette($ricette);

        $view->showRecepies($ricette, $array);
    }

    static function InfoRicetta($id){
        $view = new VRicette();
        $pm = USingleton::getInstance('FPersistentManager');
        $ricetta = $pm::load('FRicetta', array(['id', '=', $id]));
        $autore = $pm::load('FUtente', array(['id', '=', $ricetta->getAutore()]));
        //$immagini = $pm::load('FRicetta', array(['id', '=', $ricetta->getId_immagine()]));

        $view->showInfo($ricetta, $autore);
    }

    static function homeRicette($ricette){
        $ricette_home = array();
        $immagini_home = array();
        $autori_ricette = array();
        $pm = USingleton::getInstance('FPersistentManager');
        for ($i = 0; $i < count($ricette); $i++){
            $ricette_home[$i] = $ricette[$i];
            $autori_ricette[$i] = $pm::load('FUtente', array(['id', '=', $ricette[$i]->getAutore()]));
            $immagini_home[$i] = $pm::load('FImmagine', array(['id', '=', $ricette[$i]->getId_immagine()]));

        }
        return array($ricette_home, $autori_ricette, $immagini_home);
    }

    static function EsploraLeRicette($new_index, $filtro=''){

        $pm = USingleton::getInstance('FPersistentManager');

        $num_ricette = $pm::getRows('FRicetta');
        $immagini = array();

        if ($num_ricette % 5 != 0){
            $page_number = floor($num_ricette / 5 + 1);
        } else {
            $page_number = $num_ricette / 5;
        }

        if ($new_index * 5 <= $num_ricette){
            $ricette_pag = $pm::load('FRicetta', array(['id', '>', ($new_index - 1) * 5]), '', 5);
        } else {
            $limite = $num_ricette % 5;
            $ricette_pag[] = $pm::load('FRicetta', array(['id', '>', $new_index * 5 - 5]), '', $limite);
        }

        for($i = 0; $i < count($ricette_pag); $i++){
            $immagini[$i] = $pm::load('FImmagine', array(['id', '=', $ricette_pag[$i]->getId_immagine()]));
        }

        $view = new VRicette();

        $view->showAll($ricette_pag, $page_number, $new_index, $num_ricette, $immagini);
    }




}