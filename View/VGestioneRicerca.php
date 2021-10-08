<?php

class VGestioneRicerca
{

    private $smarty;

    public function __construct()
    {
        $this->smarty = StartSmarty::configuration();
    }

    public function showHome($ricette_home, $autori_ricette, $immagini, $post_home, $post_author, $post_immagine, $immagini_autore){
        if (CUtente::isLogged()) $utente = $this->smarty->assign('userlogged', 'loggato');

        $this->smarty->assign('ricette_home', $ricette_home);
        $this->smarty->assign('autori_ricette', $autori_ricette);
        $this->smarty->assign('immagini', $immagini);

        $this->smarty->assign('post_home', $post_home);
        $this->smarty->assign('post_author', $post_author);
        $this->smarty->assign('post_immagine', $post_immagine);
        $this->smarty->assign('immagini_autore', $immagini_autore);

        $this->smarty->display('./smarty/libs/templates/index.tpl');
    }
}