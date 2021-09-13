<?php

class VGestioneRicerca
{

    private $smarty;

    public function __construct()
    {
        $this->smarty = StartSmarty::configuration();
    }

    public function showHome(){
        if (CUtente::isLogged()) $utente = $this->smarty->assign('userlogged', 'loggato');

        $this->smarty->assign('Immagine1', './smarty/libs/assets/ThomasKeller828x1344.jpg');
        $this->smarty->assign('Nome_Ricetta1', 'Cavoli in brodo');
        $this->smarty->assign('Descrizione_Ricetta1', 'gaia è bella');

        $this->smarty->assign('Immagine2', './smarty/libs/assets/ThomasKeller828x1344.jpg');
        $this->smarty->assign('Nome_Ricetta2', 'Pollo Arrosto');
        $this->smarty->assign('Descrizione_Ricetta2', 'Gaia è sempre più bella');

        $this->smarty->assign('Immagine3', './smarty/libs/assets/ThomasKeller828x1344.jpg');
        $this->smarty->assign('Nome_Ricetta3', 'Carbonara');
        $this->smarty->assign('Descrizione_Ricetta3' ,'Madonna quanto è bella gaia');

        $this->smarty->assign('Immagine4', './smarty/libs/assets/ThomasKeller828x1344.jpg');
        $this->smarty->assign('Titolo_Ricetta1', 'aersav');
        $this->smarty->assign('Intro_Ricetta1', 'sdfgsr');
        $this->smarty->assign('Data_Ricetta1', date('d/m/y'));

        $this->smarty->assign('Immagine5', './smarty/libs/assets/ThomasKeller828x1344.jpg');
        $this->smarty->assign('Titolo_Ricetta2', 'srdb');
        $this->smarty->assign('Intro_Ricetta2', 'sdabfab');
        $this->smarty->assign('Data_Ricetta2', date('d/m/y'));

        $this->smarty->assign('Immagine6', './smarty/libs/assets/ThomasKeller828x1344.jpg');
        $this->smarty->assign('Titolo_Ricetta3', 'sdfhb');
        $this->smarty->assign('Intro_Ricetta3', 'sdbabafa');
        $this->smarty->assign('Data_Ricetta3', date('d/m/y'));

        $this->smarty->assign('Immagine7', './smarty/libs/assets/ThomasKeller828x1344.jpg');
        $this->smarty->assign('Titolo_Ricetta4', 'fsdbbsbfd');
        $this->smarty->assign('Intro_Ricetta4', 'dsfwbsdffbs');
        $this->smarty->assign('Data_Ricetta4', date('d/m/y'));

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