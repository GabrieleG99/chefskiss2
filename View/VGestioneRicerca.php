<?php

class VGestioneRicerca
{

    private $smarty;

    public function __construct()
    {
        $this->smarty = StartSmarty::configuration();
    }

    public function showHome($ricette_home, $autori_ricette, $immagini){
        if (CUtente::isLogged()) $utente = $this->smarty->assign('userlogged', 'loggato');

        $this->smarty->assign('ricette_home', $ricette_home);
        $this->smarty->assign('autori_ricette', $autori_ricette);
        $this->smarty->assign('immagini', $immagini);

        $this->smarty->assign('Immagine_Forum1', './smarty/libs/assets/ThomasKeller828x1344.jpg');
        $this->smarty->assign('Titolo_Post1', 'esrsbebfsd');
        $this->smarty->assign('Descrizione_Post1', 'sdrhbsbdfs');
        $this->smarty->assign('Immagine_Autore1', './smarty/libs/assets/ThomasKeller828x1344.jpg');
        $this->smarty->assign('Nome_Autore1', 'Ciccio Ciaccio');
        $this->smarty->assign('Data_Post1', date('d/m/y'));

        $this->smarty->assign('Immagine_Forum2', './smarty/libs/assets/ThomasKeller828x1344.jpg');
        $this->smarty->assign('Titolo_Post2', 'esrsbebfsd');
        $this->smarty->assign('Descrizione_Post2', 'sdrhbsbdfs');
        $this->smarty->assign('Immagine_Autore2', './smarty/libs/assets/ThomasKeller828x1344.jpg');
        $this->smarty->assign('Nome_Autore2', 'Ciccio Ciaccio');
        $this->smarty->assign('Data_Post2', date('d/m/y'));

        $this->smarty->assign('Immagine_Forum3', './smarty/libs/assets/ThomasKeller828x1344.jpg');
        $this->smarty->assign('Titolo_Post3', 'esrsbebfsd');
        $this->smarty->assign('Descrizione_Post3', 'sdrhbsbdfs');
        $this->smarty->assign('Immagine_Autore3', './smarty/libs/assets/ThomasKeller828x1344.jpg');
        $this->smarty->assign('Nome_Autore3', 'Ciccio Ciaccio');
        $this->smarty->assign('Data_Post3', date('d/m/y'));

        $this->smarty->display('./smarty/libs/templates/index.tpl');
    }
}