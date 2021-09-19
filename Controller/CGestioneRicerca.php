<?php

class CGestioneRicerca
{

    public static function blogHome(){
        $vSearch = new VGestioneRicerca();

        $pm = USingleton::getInstance('FPersistentManager');

        $ricette = $pm::load('FRicetta', array(), );

        $vSearch->showHome();
    }
}