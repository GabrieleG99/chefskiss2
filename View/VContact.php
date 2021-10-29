<?php

class VContact
{
    private $smarty;

    public function __construct()
    {
        $this->smarty = StartSmarty::configuration();
    }

    public function contact(){
        $this->smarty->display('contact.tpl');
    }

}