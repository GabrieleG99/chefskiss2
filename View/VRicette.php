<?php

class VRicette
{

    private $smarty;

    public function __construct()
    {
        $this->smarty = StartSmarty::configuration();
    }

    function showRecepies($ricette, $array){ //forse da inserire utente tra i parametri in ingresso
        if (CUtente::isLogged()) $this->smarty->assign('userlogged', 'logged');

        $numero = rand(0, count(array($ricette)) - 1);

        $this->smarty->assign('ran_num', $numero);
        $this->smarty->assign('ricette', $ricette);
        $this->smarty->assign('array', $array);

        $this->smarty->display('ricette.tpl');
    }

    function showInfo(ERicetta $ricetta, $user){ //aggiungere variabile in ingresso user
        if (CUtente::isLogged()) $this->smarty->assign('userlogged', 'logged');

        $procedimento = explode('.', $ricetta->getProcedimento());

        $this->smarty->assign('utente', $user);
        $this->smarty->assign('ricetta', $ricetta);
        $this->smarty->assign('procedimento', $procedimento);

        $this->smarty->display('ricetta_info.tpl');
    }

    function showAll($ricette, $num_pagine, $index, $num_ricette, $immagini){
        if (CUtente::isLogged()) $this->smarty->assign('userlogged', 'logged');

        $this->smarty->assign('immagini', $immagini);
        $this->smarty->assign('ricette', $ricette);
        $this->smarty->assign('num_pagine', $num_pagine);
        $this->smarty->assign('index', $index);
        $this->smarty->assign('num_ricette', $num_ricette);

        $this->smarty->display('tutte_ricette.tpl');
    }

}