<?php

//require_once '../StartSmarty.php';


class VUtente
{

    private $smarty;

    public function __construct()
    {
        $this->smarty = StartSmarty::configuration();
    }

    public function showFormLogin(){
        $this->smarty->display('./smarty/libs/templates/login_registration_form.tpl');
    }

    public function loginOk(){
        $this->smarty->display('.smarty/libs/templates/index.tpl');
    }

    public function loginErr(){
        $this->smarty->assign('error', "errore");
        $this->smarty->display('./smarty/libs/templates/login_registration_form.tpl');
    }

    public function registrationError($error){
        switch ($error){
            case 'email':
                $this->smarty->assign('emailError', "errore");
                break;
        }
        $this->smarty->display('.smarty/libs/templates/login_registration_form.tpl');
    }

    public function profilo($ricette, $utente, $immagini){
        if (CUtente::isLogged()) $this->smarty->assign('userlogged', 'logged');

        $this->smarty->assign('utente', $utente);
        $this->smarty->assign('ricette', $ricette);
        $this->smarty->assign('immagini', $immagini);

        $this->smarty->display('profile.tpl');
    }

}