<?php

class VContact
{
    private $smarty;

    public function __construct()
    {
        $this->smarty = StartSmarty::configuration();
    }
    static function getName(){
        return $_POST['name'];
    }
    static function getEmail(){
        return $_POST['email'];
    }
    static function getMessage(){
        return $_POST['message'];
    }


    public function contact(){
        $this->smarty->display('contact.tpl');
    }

}