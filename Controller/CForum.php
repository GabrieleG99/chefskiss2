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

        for($i = 0; $i < sizeof($post_pag); $i++){
            $immagini[$i] = $pm::load('FImmagine', array(['id', '=', $post_pag[$i]->getId_immagine()]));
        }

        $view = new VForum();

        $view->showForum($post_pag, $page_number, $new_index, $num_post, $immagini);
    }
}