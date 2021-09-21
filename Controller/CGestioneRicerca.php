<?php

class CGestioneRicerca
{

    public static function blogHome(){
        $vSearch = new VGestioneRicerca();

        $pm = USingleton::getInstance('FPersistentManager');

        $ricette = $pm::load('FRicetta', array(), 'data');

        for($i = 0; $i < 3; $i++){ // passo tre ricette nel carosello
            $ricette_home[$i] = $ricette[$i];
            $autori_ricette[$i] = $pm::load('FUtente', array(['id', '=', $ricette[$i]->getAutore()]));
            $immagini[$i] = $pm::load('FImmagine', array(['id', '=', $ricette[$i]->getId_immagine()]));
        }

        $ricette = $pm::load('FRicetta', array(), 'valutazione');

        for($i = 3; $i < 7; $i++){ // passo quattro ricette tra le più votate
            $ricette_home[$i] = $ricette[$i];
            $autori_ricette[] = $pm::load('FUtente', array(['id', '=', $ricette[$i]->getAutore()]));
            $immagini[] = $pm::load('FImmagine', array(['id', '=', $ricette[$i]->getId_immagine()]));
        }

        $vSearch->showHome($ricette_home, $autori_ricette, $immagini);
    }
}