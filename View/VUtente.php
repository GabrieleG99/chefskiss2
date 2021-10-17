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

    public function profilo($ricette, $utente, $immagini, $immagine_utente, $immagini_autori){
        if (CUtente::isLogged()) $this->smarty->assign('userlogged', 'logged');

        $this->smarty->assign('utente', $utente);
        $this->smarty->assign('ricette', $ricette);
        $this->smarty->assign('immagini', $immagini);
        $this->smarty->assign('immagine_utente', $immagine_utente);
        $this->smarty->assign('immagini_autori', $immagini_autori);

        $this->smarty->display('profile.tpl');
    }

    public function modificaProfilo($utente, $immagine_utente){
        if (CUtente::isLogged()) $this->smarty->assign('userlogged', 'logged');

        $this->smarty->assign('utente', $utente);
        $this->smarty->assign('immagine_utente', $immagine_utente);
        $this->smarty->display('edit-profile.tpl');
    }

}