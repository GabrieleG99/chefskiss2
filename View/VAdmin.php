<?php

class VAdmin{

    private $smarty;

    public function __construct()
    {
        $this->smarty = StartSmarty::configuration();
    }

   function homepage($utente, $list, $immagine){
        $this->smarty->assign('utente', $utente);
        $this->smarty->assign('list', $list);
        $this->smarty->assign('immagine', $immagine);

        $this->smarty->display('admin.tpl');
    }
    function profiloUtente($utente, $immagine){
        $this->smarty->assign('utente',$utente);
        $this->smarty->assign('immagine', $immagine);

        $this->smarty->display('user.tpl');
    }



}