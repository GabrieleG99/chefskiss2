<?php
/* Smarty version 3.1.39, created on 2021-11-12 11:58:23
  from '/Applications/XAMPP/xamppfiles/htdocs/chefskiss/smarty/libs/templates/forum.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_618e48cfc328f1_63186600',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2bb3a53173060b218b340c019eda9d8eaa3ec93b' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/chefskiss/smarty/libs/templates/forum.tpl',
      1 => 1636714702,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_618e48cfc328f1_63186600 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<?php $_smarty_tpl->_assignInScope('userlogged', (($tmp = @$_smarty_tpl->tpl_vars['userlogged']->value)===null||$tmp==='' ? 'nouser' : $tmp));
$_smarty_tpl->_assignInScope('searchMod', (($tmp = @$_smarty_tpl->tpl_vars['searchMod']->value)===null||$tmp==='' ? 'searchOff' : $tmp));?>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Chef's Kiss - Forum e Ricette</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="/chefskiss/smarty/libs/assets/chef-hat.png" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="/chefskiss/smarty/libs/css/boot_styles.css" rel="stylesheet" />
        <link rel="stylesheet" href="/chefskiss/smarty/libs/css/toast.css">
    </head>
    <body>
        <!-- Responsive navbar-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container px-5">
                <a class="navbar-brand" href="index.tpl">Chef's kiss</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link" href="/chefskiss/">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="/chefskiss/Contact/contattaci">Contact</a></li>
                        <li class="nav-item"><a class="nav-link" href="/chefskiss/Forum/esploraLeDomande">Forum</a></li>
                        <li class="nav-item"><a class="nav-link" href="/chefskiss/Ricette/esplora">Ricette</a></li>
                        <?php if ($_smarty_tpl->tpl_vars['userlogged']->value != 'nouser') {?>
                            <li class="nav-item text-light">
                                <a class="nav-link" href="/chefskiss/Ricette/nuovaRicetta"> Nuova Ricetta</a>
                            </li>
                            <li class="nav-item text-light">
                                <a class="nav-link" href="/chefskiss/Forum/nuovaDomanda"> Nuova Domanda</a>
                            </li>
                            <li class="nav-item text-light">
                                <a class="nav-link" href="/chefskiss/Utente/profilo">Profilo</a>
                            </li>
                            <li class="nav-item text-light">
                                <a class="nav-link" href="/chefskiss/Utente/logout">Disconnetti</a>
                            </li>
                        <?php } else { ?>
                            <li class="nav-item">
                                <a class="nav-link" href="/chefskiss/Utente/login">Accedi</a>
                            </li>
                        <?php }?>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Page header with logo and tagline-->
        <header class="py-5 bg-light border-bottom mb-4">
            <div class="container">
                <div class="text-center my-5">
                    <h1 class="fw-bolder">Benvenuto nel Forum!</h1>
                    <p class="lead mb-0">Naviga tra le domande poste dai nostri utenti</p>
                </div>
            </div>
        </header>
        <!-- Page content-->
        <div class="container">
            <?php if (!is_array($_smarty_tpl->tpl_vars['immagini']->value) && !is_array($_smarty_tpl->tpl_vars['post']->value)) {?>
                <div class="row">
                    <!-- Blog entries-->
                    <div class="col-lg-8">
                        <!-- Featured blog post-->
                        <div class="card mb-4">
                            <a href="/chefskiss/Forum/InfoPost/<?php echo $_smarty_tpl->tpl_vars['post']->value->getId();?>
"><img class="card-img-top" src="data:<?php echo $_smarty_tpl->tpl_vars['immagini']->value->getTipo();?>
;base64, <?php echo $_smarty_tpl->tpl_vars['immagini']->value->getImmagine();?>
" width=900 height=400 alt="..." /></a>
                            <div class="card-body">
                                <h2 class="card-title"><?php echo $_smarty_tpl->tpl_vars['post']->value->getTitolo();?>
</h2>
                                <p class="card-text"><?php echo substr($_smarty_tpl->tpl_vars['post']->value->getDomanda(),0,100);?>
...</p>
                                <div class="small text-muted"><?php echo $_smarty_tpl->tpl_vars['post']->value->getData_pubb();?>
</div>
                        </div>
                    </div>
                
            <?php } else { ?>
                <div class="row">
                    <!-- Blog entries-->
                    <div class="col-lg-8">
                        <!-- Featured blog post-->
                        <div class="card mb-4">
                            <a href="/chefskiss/Forum/InfoPost/<?php echo $_smarty_tpl->tpl_vars['post']->value[0]->getId();?>
"><img class="card-img-top" src="data:<?php echo $_smarty_tpl->tpl_vars['immagini']->value[0]->getTipo();?>
;base64, <?php echo $_smarty_tpl->tpl_vars['immagini']->value[0]->getImmagine();?>
" width=900 height=400 alt="..." /></a>
                            <div class="card-body">
                                <h2 class="card-title"><?php echo $_smarty_tpl->tpl_vars['post']->value[0]->getTitolo();?>
</h2>
                                <p class="card-text"><?php echo substr($_smarty_tpl->tpl_vars['post']->value[0]->getDomanda(),0,100);?>
...</p>
                                <div class="small text-muted"><?php echo $_smarty_tpl->tpl_vars['post']->value[0]->getData_pubb();?>
</div>
                            </div>
                        </div>
                        <!-- Nested row for non-featured blog posts-->
                        <div class="row">
                            <div class="col-lg-6">
                                <!-- Blog post-->
                                <?php if (count($_smarty_tpl->tpl_vars['post']->value) >= 2) {?>
                                    <div class="card mb-4">
                                        <a href="/chefskiss/Forum/InfoPost/<?php echo $_smarty_tpl->tpl_vars['post']->value[1]->getId();?>
"><img class="card-img-top" src="data:<?php echo $_smarty_tpl->tpl_vars['immagini']->value[1]->getTipo();?>
;base64, <?php echo $_smarty_tpl->tpl_vars['immagini']->value[1]->getImmagine();?>
" alt="..." /></a>
                                        <div class="card-body">
                                            <h2 class="card-title h4"><?php echo $_smarty_tpl->tpl_vars['post']->value[1]->getTitolo();?>
</h2>
                                            <p class="card-text"><?php echo substr($_smarty_tpl->tpl_vars['post']->value[1]->getDomanda(),0,100);?>
...</p>
                                            <div class="small text-muted"><?php echo $_smarty_tpl->tpl_vars['post']->value[1]->getData_pubb();?>
</div>
                                        </div>
                                    </div>
                                <?php }?>
                                <!-- Blog post-->
                                <?php if (count($_smarty_tpl->tpl_vars['post']->value) >= 3) {?>
                                    <div class="card mb-4">
                                        <a href="/chefskiss/Forum/InfoPost/<?php echo $_smarty_tpl->tpl_vars['post']->value[2]->getId();?>
"><img class="card-img-top" src="data:<?php echo $_smarty_tpl->tpl_vars['immagini']->value[2]->getTipo();?>
;base64, <?php echo $_smarty_tpl->tpl_vars['immagini']->value[2]->getImmagine();?>
" alt="..." /></a>
                                        <div class="card-body">
                                            <h2 class="card-title h4"><?php echo $_smarty_tpl->tpl_vars['post']->value[2]->getTitolo();?>
</h2>
                                            <p class="card-text"><?php echo substr($_smarty_tpl->tpl_vars['post']->value[2]->getDomanda(),0,100);?>
...</p>
                                            <div class="small text-muted"><?php echo $_smarty_tpl->tpl_vars['post']->value[2]->getData_pubb();?>
</div>
                                        </div>
                                    </div>
                                <?php }?>
                            </div>
                            <div class="col-lg-6">
                                <!-- Blog post-->
                                <?php if (count($_smarty_tpl->tpl_vars['post']->value) >= 4) {?>
                                <div class="card mb-4">
                                    <a href="/chefskiss/Forum/InfoPost/<?php echo $_smarty_tpl->tpl_vars['post']->value[3]->getId();?>
"><img class="card-img-top" src="data:<?php echo $_smarty_tpl->tpl_vars['immagini']->value[3]->getTipo();?>
;base64, <?php echo $_smarty_tpl->tpl_vars['immagini']->value[3]->getImmagine();?>
" alt="..." /></a>
                                    <div class="card-body">
                                        <h2 class="card-title h4"><?php echo $_smarty_tpl->tpl_vars['post']->value[3]->getTitolo();?>
</h2>
                                        <p class="card-text"><?php echo substr($_smarty_tpl->tpl_vars['post']->value[3]->getDomanda(),0,100);?>
...</p>
                                        <div class="small text-muted"><?php echo $_smarty_tpl->tpl_vars['post']->value[2]->getData_pubb();?>
</div>
                                    </div>
                                </div>
                                <?php }?>
                                <!-- Blog post-->
                                <?php if (count($_smarty_tpl->tpl_vars['post']->value) == 5) {?>
                                <div class="card mb-4">
                                    <a href="/chefskiss/Forum/InfoPost/<?php echo $_smarty_tpl->tpl_vars['post']->value[4]->getId();?>
"><img class="card-img-top" src="data:<?php echo $_smarty_tpl->tpl_vars['immagini']->value[4]->getTipo();?>
;base64, <?php echo $_smarty_tpl->tpl_vars['immagini']->value[4]->getImmagine();?>
" alt="..." /></a>
                                    <div class="card-body">
                                        <h2 class="card-title h4"><?php echo $_smarty_tpl->tpl_vars['post']->value[4]->getTitolo();?>
</h2>
                                        <p class="card-text"><?php echo substr($_smarty_tpl->tpl_vars['post']->value[4]->getDomanda(),0,100);?>
...</p>
                                        <div class="small text-muted"><?php echo $_smarty_tpl->tpl_vars['post']->value[2]->getData_pubb();?>
</div>
                                    </div>
                                </div>
                                <?php }?>
                            </div>
                        </div>
                    <?php }?>
                    <!-- Pagination-->
                    <nav aria-label="Pagination">
                        <hr class="my-0" />
                        <ul class="pagination justify-content-center my-4">
                            <?php if ($_smarty_tpl->tpl_vars['searchMod']->value == 'searchOff') {?>
                                <?php if ($_smarty_tpl->tpl_vars['index']->value == 1) {?>
                                    <li class="page-item disabled"><a class="page-link" href="#" tabindex="-1" aria-disabled="true">Back</a></li>
                                    <li class="page-item active" aria-current="page"><a class="page-link" href="/chefskiss/Forum/esploraLeDomande//<?php echo $_smarty_tpl->tpl_vars['index']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['index']->value;?>
</a></li>
                                    <?php if ($_smarty_tpl->tpl_vars['index']->value+1 < $_smarty_tpl->tpl_vars['num_pagine']->value) {?>
                                        <li class="page-item"><a class="page-link" href="/chefskiss/Forum/esploraLeDomande//<?php echo $_smarty_tpl->tpl_vars['index']->value+1;?>
"><?php echo $_smarty_tpl->tpl_vars['index']->value+1;?>
</a></li>
                                    <?php }?>
                                    <?php if ($_smarty_tpl->tpl_vars['index']->value+2 < $_smarty_tpl->tpl_vars['num_pagine']->value) {?>
                                        <li class="page-item"><a class="page-link" href="/chefskiss/Forum/esploraLeDomande//<?php echo $_smarty_tpl->tpl_vars['index']->value+2;?>
"><?php echo $_smarty_tpl->tpl_vars['index']->value+2;?>
</a></li>
                                    <?php }?>
                                <?php } else { ?>
                                    <li class="page-item"><a class="page-link" href="/chefskiss/Forum/esploraLeDomande//<?php echo $_smarty_tpl->tpl_vars['index']->value-1;?>
" tabindex="-1" aria-disabled="true">Back</a></li>
                                    <li class="page-item" aria-current="page"><a class="page-link" href="/chefskiss/Forum/esploraLeDomande//<?php echo $_smarty_tpl->tpl_vars['index']->value-1;?>
"><?php echo $_smarty_tpl->tpl_vars['index']->value-1;?>
</a></li>
                                    <li class="page-item active"><a class="page-link" href="/chefskiss/Forum/esploraLeDomande//<?php echo $_smarty_tpl->tpl_vars['index']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['index']->value;?>
</a></li>
                                    <?php if ($_smarty_tpl->tpl_vars['index']->value+1 < $_smarty_tpl->tpl_vars['num_pagine']->value) {?>
                                        <li class="page-item"><a class="page-link" href="/chefskiss/Forum/esploraLeDomande//<?php echo $_smarty_tpl->tpl_vars['index']->value+1;?>
"><?php echo $_smarty_tpl->tpl_vars['index']->value+1;?>
</a></li>
                                    <?php }?>
                                <?php }?>
                                <?php if ($_smarty_tpl->tpl_vars['num_pagine']->value <= $_smarty_tpl->tpl_vars['index']->value+1 && $_smarty_tpl->tpl_vars['num_pagine']->value != $_smarty_tpl->tpl_vars['index']->value) {?>
                                    <li class="page-item"><a class="page-link" href="/chefskiss/Forum/esploraLeDomande//<?php echo $_smarty_tpl->tpl_vars['num_pagine']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['num_pagine']->value;?>
</a></li>
                                <?php } elseif ($_smarty_tpl->tpl_vars['index']->value < $_smarty_tpl->tpl_vars['num_pagine']->value-1) {?>
                                    <li class="page-item disabled"><a class="page-link" href="#!">...</a></li>
                                    <li class="page-item"><a class="page-link" href="/chefskiss/Forum/esploraLeDomande//<?php echo $_smarty_tpl->tpl_vars['num_pagine']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['num_pagine']->value;?>
</a></li>
                                <?php }?>
                                <?php if ($_smarty_tpl->tpl_vars['num_pagine']->value >= $_smarty_tpl->tpl_vars['index']->value+1) {?>
                                    <li class="page-item"><a class="page-link" href="/chefskiss/Forum/esploraLeDomande//<?php echo $_smarty_tpl->tpl_vars['index']->value+1;?>
">Next</a></li>
                                <?php } else { ?>
                                    <li class="page-item disabled"><a class="page-link" href="/chefskiss/Forum/esploraLeDomande//<?php echo $_smarty_tpl->tpl_vars['index']->value+1;?>
">Next</a></li>
                                <?php }?>
                                <?php } else { ?>
                                <?php if ($_smarty_tpl->tpl_vars['index']->value == 1) {?>
                                    <li class="page-item disabled"><a class="page-link" href="#" tabindex="-1" aria-disabled="true">Back</a></li>
                                    <li class="page-item active" aria-current="page"><a class="page-link" href="/chefskiss/Forum/esploraLeDomande/cerca/<?php echo $_smarty_tpl->tpl_vars['index']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['index']->value;?>
</a></li>
                                    <?php if ($_smarty_tpl->tpl_vars['index']->value+1 < $_smarty_tpl->tpl_vars['num_pagine']->value) {?>
                                        <li class="page-item"><a class="page-link" href="/chefskiss/Forum/esploraLeDomande/cerca/<?php echo $_smarty_tpl->tpl_vars['index']->value+1;?>
"><?php echo $_smarty_tpl->tpl_vars['index']->value+1;?>
</a></li>
                                    <?php }?>
                                    <?php if ($_smarty_tpl->tpl_vars['index']->value+2 < $_smarty_tpl->tpl_vars['num_pagine']->value) {?>
                                        <li class="page-item"><a class="page-link" href="/chefskiss/Forum/esploraLeDomande/cerca/<?php echo $_smarty_tpl->tpl_vars['index']->value+2;?>
"><?php echo $_smarty_tpl->tpl_vars['index']->value+2;?>
</a></li>
                                    <?php }?>
                                <?php } else { ?>
                                    <li class="page-item"><a class="page-link" href="/chefskiss/Forum/esploraLeDomande/cerca/<?php echo $_smarty_tpl->tpl_vars['index']->value-1;?>
" tabindex="-1" aria-disabled="true">Back</a></li>
                                    <li class="page-item" aria-current="page"><a class="page-link" href="/chefskiss/Forum/esploraLeDomande/cerca/<?php echo $_smarty_tpl->tpl_vars['index']->value-1;?>
"><?php echo $_smarty_tpl->tpl_vars['index']->value-1;?>
</a></li>
                                    <li class="page-item active"><a class="page-link" href="/chefskiss/Forum/esploraLeDomande/cerca/<?php echo $_smarty_tpl->tpl_vars['index']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['index']->value;?>
</a></li>
                                    <?php if ($_smarty_tpl->tpl_vars['index']->value+1 < $_smarty_tpl->tpl_vars['num_pagine']->value) {?>
                                        <li class="page-item"><a class="page-link" href="/chefskiss/Forum/esploraLeDomande/cerca/<?php echo $_smarty_tpl->tpl_vars['index']->value+1;?>
"><?php echo $_smarty_tpl->tpl_vars['index']->value+1;?>
</a></li>
                                    <?php }?>
                                <?php }?>
                                <?php if ($_smarty_tpl->tpl_vars['num_pagine']->value <= $_smarty_tpl->tpl_vars['index']->value+1 && $_smarty_tpl->tpl_vars['num_pagine']->value != $_smarty_tpl->tpl_vars['index']->value) {?>
                                    <li class="page-item"><a class="page-link" href="/chefskiss/Forum/esploraLeDomande/cerca/<?php echo $_smarty_tpl->tpl_vars['num_pagine']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['num_pagine']->value;?>
</a></li>
                                <?php } elseif ($_smarty_tpl->tpl_vars['index']->value < $_smarty_tpl->tpl_vars['num_pagine']->value-1) {?>
                                    <li class="page-item disabled"><a class="page-link" href="#!">...</a></li>
                                    <li class="page-item"><a class="page-link" href="/chefskiss/Forum/esploraLeDomande/cerca/<?php echo $_smarty_tpl->tpl_vars['num_pagine']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['num_pagine']->value;?>
</a></li>
                                <?php }?>
                                <?php if ($_smarty_tpl->tpl_vars['num_pagine']->value >= $_smarty_tpl->tpl_vars['index']->value+1) {?>
                                <li class="page-item"><a class="page-link" href="/chefskiss/Forum/esploraLeDomande/cerca/<?php echo $_smarty_tpl->tpl_vars['index']->value+1;?>
">Next</a></li>
                                    <?php } else { ?>
                                    <li class="page-item disabled"><a class="page-link" href="/chefskiss/Forum/esploraLeDomande/cerca/<?php echo $_smarty_tpl->tpl_vars['index']->value+1;?>
">Next</a></li>
                                <?php }?>
                            <?php }?>
                        </ul>
                    </nav>
                </div>
                <!-- Side widgets-->
                <div class="col-lg-4">
                    <!-- Search widget-->
                    <div class="card mb-4">
                        <div class="card-header">Search</div>
                        <div class="card-body">
                            <form method="post" action="/chefskiss/Forum/cerca">
                                <div class="input-group">
                                    <input class="form-control" name="text" type="text" placeholder="Enter search term..." aria-label="Enter search term..." aria-describedby="button-search" />
                                    <button class="btn btn-primary" id="button-search" type="button">Go!</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- Categories widget-->
                    <div class="card mb-4">
                        <div class="card-header">Categories</div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <ul class="list-unstyled mb-0">
                                        <li><a href="/chefskiss/Forum/cerca?categoria=primi">Primi</a></li>
                                        <li><a href="/chefskiss/Forum/cerca?categoria=contorni">Contorni</a></li>
                                        <li><a href="/chefskiss/Forum/cerca?categoria=antipasti">Antipasti</a></li>
                                    </ul>
                                </div>
                                <div class="col-sm-6">
                                    <ul class="list-unstyled mb-0">
                                        <li><a href="/chefskiss/Forum/cerca?categoria=secondi">Secondi</a></li>
                                        <li><a href="/chefskiss/Forum/cerca?categoria=dessert">Dessert</a></li>
                                        <li><a href="/chefskiss/Forum/cerca?categoria=salse">Salse</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
                    <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2021</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"><?php echo '</script'; ?>
>
        <!-- Core theme JS-->
        <?php echo '<script'; ?>
 src="js/scripts.js"><?php echo '</script'; ?>
>
        </div>
    </body>
</html>
<?php }
}
