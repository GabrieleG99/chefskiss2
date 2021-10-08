<?php

class CModeratore
{

    static function rimuoviRicetta($id, $id_imm)
    {
        $pm = USingleton::getInstance('FPersistentManager');
        $session = USingleton::getInstance('USession');
        $mod = unserialize($session->readValue('utente'));
        if ($mod != null && $mod->getPrivilegi() >= 2) {
            $pm::delete('id', $id, 'FRicetta');
            $pm::delete('id', $id_imm, 'Fimmagine');
            header("Location: /chefskiss/Ricette/EsploraLeRicette");
        } else {
            header("Location: /chefskiss/Ricette/EsploraLeRicette");
        }

    }


}