<?php

class CGestioneRicerca
{

    public static function blogHome(){
        $vSearch = new VGestioneRicerca();

        $pm = USingleton::getInstance('FPersistentManager');

        $ricette = $pm::load('FRicetta', array(), 'data', 3);

        $num_post = $pm::getRows('FPost');

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

        $ran_num = array();
        $check = 0;

        for ($i = 0; $i < 3; $i++){
            while($check != 1){
                $new_num = rand(0, $num_post - 1);
                if (!in_array($new_num, $ran_num)){
                    $ran_num[] = $new_num;
                    $check = 1;
                }
            }

            $post_id = $pm::loadDefCol('FPost', array('id'));
            $post_home[] = $pm::load('FPost', array(['id', '=', $post_id[$ran_num[$i]]['id']]));
            $post_author[] = $pm::load('FUtente', array(['id', '=', $post_home[$i]->getAutore()]));
            $post_immagini[] = $pm::load('FImmagine', array(['id', '=', $post_home[$i]->getId_immagine()])); //TODO: ['id', '=', $post_author[$i]->getId_immagine()] aggiungere quando sarà fatta la gestione immagini per gli utenti

            $check = 0;
        }

        $vSearch->showHome($ricette_home, $autori_ricette, $immagini, $post_home, $post_author, $post_immagini);
    }
}