<?php

class VForum
{
    public function __construct()
    {
        $this->smarty = StartSmarty::configuration();
    }

    function showForum($post, $num_pagine, $index, $num_post, $immagini, $cerca){
        if (CUtente::isLogged()) $this->smarty->assign('userlogged', 'logged');
        if ($cerca != null) $this->smarty->assign('searchMod', 'searchOn');

        $this->smarty->assign('immagini', $immagini);
        $this->smarty->assign('post', $post);
        $this->smarty->assign('num_pagine', $num_pagine);
        $this->smarty->assign('index', $index);
        $this->smarty->assign('num_post', $num_post);

        $this->smarty->display('forum.tpl');
    }

    function showInfo(EPost $post, $user, $immagine,$array){
        if (CUtente::isLogged()) $this->smarty->assign('userlogged', 'logged');

        $domanda = explode('.', $post->getDomanda());

        $this->smarty->assign('utente', $user);
        $this->smarty->assign('post', $post);
        $this->smarty->assign('domanda', $domanda);
        $this->smarty->assign('immagine', $immagine);
        $this->smarty->assign('array', $array);

        $this->smarty->display('forum_info.tpl');
    }

    function showSubmitPost(){
        $this->smarty->display('new-post.tpl');
    }
}