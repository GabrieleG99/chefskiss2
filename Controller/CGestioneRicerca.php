<?php

class CGestioneRicerca
{

    public static function blogHome(){
        $vSearch = new VGestioneRicerca();

        $pm = USingleton::getInstance('FPersistentManager');

        $ricette = $pm::load('FRicetta', array(), 'data', 3);

        for($i = 0; $i < 3; $i++){ // passo tre ricette nel carosello
            $ricette_home[$i] = $ricette[$i];
            $autori_ricette[$i] = $pm::load('FUtente', array(['id', '=', $ricette[$i]->getAutore()]));
            $immagini[$i] = $pm::load('FImmagine', array(['id', '=', $ricette[$i]->getId_immagine()]));
        }

        $ricette_votate = $pm::load('FRicetta', array(), 'valutazione');

        for($i = 0; $i < 4; $i++){ // passo quattro ricette tra le più votate
            $ricette_home[$i+3] = $ricette_votate[$i];
            $autori_ricette[] = $pm::load('FUtente', array(['id', '=', $ricette_votate[$i]->getAutore()]));
            $immagini[] = $pm::load('FImmagine', array(['id', '=', $ricette_votate[$i]->getId_immagine()]));
        }

        $vSearch->showHome($ricette_home, $autori_ricette, $immagini);
    }
}