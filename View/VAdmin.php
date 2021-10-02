<?php

class VAdmin{

    private $smarty;

    public function __construct()
    {
        $this->smarty = StartSmarty::configuration();
    }

   function homepage($utente, $list){
        $this->smarty->assign('utente', $utente);
        $this->smarty->assign('list', $list);

        $this->smarty->display('admin.tpl');
    }
    function profiloUtente($utente){
        $this->smarty->assign('utente',$utente);

        $this->smarty->display('user.tpl');
    }



}