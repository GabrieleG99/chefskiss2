<?php

class VForum
{
    public function __construct()
    {
        $this->smarty = StartSmarty::configuration();
    }

    function showForum($post, $num_pagine, $index, $num_post, $immagini){
        if (CUtente::isLogged()) $this->smarty->assign('userlogged', 'logged');

        $this->smarty->assign('immagini', $immagini);
        $this->smarty->assign('ricette', $post);
        $this->smarty->assign('num_pagine', $num_pagine);
        $this->smarty->assign('index', $index);
        $this->smarty->assign('num_ricette', $num_post);

        $this->smarty->display('forum.tpl');
    }
}