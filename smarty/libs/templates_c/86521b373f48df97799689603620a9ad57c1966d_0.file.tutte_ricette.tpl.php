<?php
/* Smarty version 3.1.39, created on 2021-09-23 16:44:33
  from 'C:\xampp\htdocs\chefskiss\smarty\libs\templates\tutte_ricette.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_614c92d127c261_83033988',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '86521b373f48df97799689603620a9ad57c1966d' => 
    array (
      0 => 'C:\\xampp\\htdocs\\chefskiss\\smarty\\libs\\templates\\tutte_ricette.tpl',
      1 => 1632408268,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_614c92d127c261_83033988 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<?php $_smarty_tpl->_assignInScope('userlogged', (($tmp = @$_smarty_tpl->tpl_vars['userlogged']->value)===null||$tmp==='' ? 'nouser' : $tmp));?>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Chef's Kiss - Forum e Ricette</title>
        <!-- Favicon-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <link rel="icon" type="image/x-icon" href="../assets/favicon.ico" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="/chefskiss/smarty/libs/css/boot_styles.css" rel="stylesheet" />
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
                        <li class="nav-item"><a class="nav-link" href="#">Contact</a></li>
                        <li class="nav-item"><a class="nav-link" href="/chefskiss/Forum/esploraLeDomande">Forum</a></li>
                        <li class="nav-item"><a class="nav-link" href="/chefskiss/Ricette/esplora">Ricette</a></li>
                        <?php if ($_smarty_tpl->tpl_vars['userlogged']->value != 'nouser') {?>
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
                        <!--<li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdownBlog" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Blog</a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownBlog">
                                <li><a class="dropdown-item" href="ricette.tpl">Blog Home</a></li>
                                <li><a class="dropdown-item" href="forum_info.tpl">Blog Post</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdownPortfolio" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Portfolio</a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownPortfolio">
                                <li><a class="dropdown-item" href="portfolio-overview.html">Portfolio Overview</a></li>
                                <li><a class="dropdown-item" href="portfolio-item.html">Portfolio Item</a></li>
                            </ul>
                        </li>-->
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Page header with logo and tagline-->
        <header class="py-5 bg-light border-bottom mb-4">
            <div class="container">
                <div class="text-center my-5">
                    <h1 class="fw-bolder">Benvenuto nelle Ricette!</h1>
                    <p class="lead mb-0">Esplora le ricette che ti appassionano di più!</p>
                </div>
            </div>
        </header>
        <!-- Page content-->
        <div class="container">
            <div class="row">
                <!-- Blog entries-->
                <div class="col-lg-8">
                    <!-- Featured blog post-->
                    <div class="card mb-4">
                        <a href="/chefskiss/Ricette/InfoRicetta/<?php echo $_smarty_tpl->tpl_vars['ricette']->value[0]->getId();?>
"><img class="card-img-top" src="data:<?php echo $_smarty_tpl->tpl_vars['immagini']->value[0]->getTipo();?>
;base64,<?php echo $_smarty_tpl->tpl_vars['immagini']->value[0]->getImmagine();?>
" width=900 height=400 alt="..." /></a>
                        <div class="card-body">
                            <div class="small text-muted"><?php echo $_smarty_tpl->tpl_vars['ricette']->value[0]->getData_();?>
 &middot;
                                <?php
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);
$_smarty_tpl->tpl_vars['i']->value = 0;
if ($_smarty_tpl->tpl_vars['i']->value < (int) $_smarty_tpl->tpl_vars['ricette']->value[0]->getValutazione()) {
for ($_foo=true;$_smarty_tpl->tpl_vars['i']->value < (int) $_smarty_tpl->tpl_vars['ricette']->value[0]->getValutazione(); $_smarty_tpl->tpl_vars['i']->value++) {
?>
                                    <i class="bi bi-star"></i>
                                <?php }
}
?>
                                </div>
                            <h2 class="card-title"><?php echo $_smarty_tpl->tpl_vars['ricette']->value[0]->getNomeRicetta();?>
</h2>
                            <p class="card-text"><?php echo substr($_smarty_tpl->tpl_vars['ricette']->value[0]->getProcedimento(),0,100);?>
...</p>
                        </div>
                    </div>
                    <!-- Nested row for non-featured blog posts-->
                        <div class="row">
                            <div class="col-lg-6">
                                <!-- Blog post-->
                                <?php if (count($_smarty_tpl->tpl_vars['ricette']->value) >= 2) {?>
                                    <div class="card mb-4">
                                        <a href="/chefskiss/Ricette/InfoRicetta/<?php echo $_smarty_tpl->tpl_vars['ricette']->value[1]->getId();?>
"><img class="card-img-top" src="data:<?php echo $_smarty_tpl->tpl_vars['immagini']->value[1]->getTipo();?>
;base64,<?php echo $_smarty_tpl->tpl_vars['immagini']->value[1]->getImmagine();?>
" width=900 height=400 alt="..." /></a>
                                        <div class="card-body">
                                            <div class="small text-muted"><?php echo $_smarty_tpl->tpl_vars['ricette']->value[1]->getData_();?>
 &middot;
                                                <?php
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);
$_smarty_tpl->tpl_vars['i']->value = 0;
if ($_smarty_tpl->tpl_vars['i']->value < (int) $_smarty_tpl->tpl_vars['ricette']->value[1]->getValutazione()) {
for ($_foo=true;$_smarty_tpl->tpl_vars['i']->value < (int) $_smarty_tpl->tpl_vars['ricette']->value[1]->getValutazione(); $_smarty_tpl->tpl_vars['i']->value++) {
?>
                                                <i class="bi bi-star"></i>
                                            <?php }
}
?>
                                            </div>
                                            <h2 class="card-title h4"><?php echo $_smarty_tpl->tpl_vars['ricette']->value[1]->getNomeRicetta();?>
</h2>
                                            <p class="card-text"><?php echo substr($_smarty_tpl->tpl_vars['ricette']->value[1]->getProcedimento(),0,100);?>
...</p>
                                        </div>
                                    </div>
                                <?php }?>
                                <!-- Blog post-->
                                <?php if (count($_smarty_tpl->tpl_vars['ricette']->value) >= 3) {?>
                                    <div class="card mb-4">
                                        <a href="/chefskiss/Ricette/InfoRicetta/<?php echo $_smarty_tpl->tpl_vars['ricette']->value[2]->getId();?>
"><img class="card-img-top" src="data:<?php echo $_smarty_tpl->tpl_vars['immagini']->value[2]->getTipo();?>
;base64,<?php echo $_smarty_tpl->tpl_vars['immagini']->value[2]->getImmagine();?>
" width=900 height=400 alt="..." /></a>
                                        <div class="card-body">
                                            <div class="small text-muted"><?php echo $_smarty_tpl->tpl_vars['ricette']->value[2]->getData_();?>
 &middot;
                                            <?php
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);
$_smarty_tpl->tpl_vars['i']->value = 0;
if ($_smarty_tpl->tpl_vars['i']->value < (int) $_smarty_tpl->tpl_vars['ricette']->value[2]->getValutazione()) {
for ($_foo=true;$_smarty_tpl->tpl_vars['i']->value < (int) $_smarty_tpl->tpl_vars['ricette']->value[2]->getValutazione(); $_smarty_tpl->tpl_vars['i']->value++) {
?>
                                                <i class="bi bi-star"></i>
                                            <?php }
}
?>
                                            </div>
                                            <h2 class="card-title h4"><?php echo $_smarty_tpl->tpl_vars['ricette']->value[2]->getNomeRicetta();?>
</h2>
                                            <p class="card-text"><?php echo substr($_smarty_tpl->tpl_vars['ricette']->value[2]->getProcedimento(),0,100);?>
...</p>
                                        </div>
                                    </div>
                                <?php }?>
                            </div>
                        <div class="col-lg-6">
                            <!-- Blog post-->
                            <?php if (count($_smarty_tpl->tpl_vars['ricette']->value) >= 4) {?>
                                <div class="card mb-4">
                                    <a href="/chefskiss/Ricette/InfoRicetta/<?php echo $_smarty_tpl->tpl_vars['ricette']->value[3]->getId();?>
"><img class="card-img-top" src="data:<?php echo $_smarty_tpl->tpl_vars['immagini']->value[3]->getTipo();?>
;base64,<?php echo $_smarty_tpl->tpl_vars['immagini']->value[3]->getImmagine();?>
" width=900 height=400 alt="..." /></a>
                                    <div class="card-body">
                                        <div class="small text-muted"><?php echo $_smarty_tpl->tpl_vars['ricette']->value[3]->getData_();?>
 &middot;
                                            <?php
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);
$_smarty_tpl->tpl_vars['i']->value = 0;
if ($_smarty_tpl->tpl_vars['i']->value < (int) $_smarty_tpl->tpl_vars['ricette']->value[3]->getValutazione()) {
for ($_foo=true;$_smarty_tpl->tpl_vars['i']->value < (int) $_smarty_tpl->tpl_vars['ricette']->value[3]->getValutazione(); $_smarty_tpl->tpl_vars['i']->value++) {
?>
                                                <i class="bi bi-star"></i>
                                            <?php }
}
?>
                                            </div>
                                        <h2 class="card-title h4"><?php echo $_smarty_tpl->tpl_vars['ricette']->value[3]->getNomeRicetta();?>
</h2>
                                        <p class="card-text"><?php echo substr($_smarty_tpl->tpl_vars['ricette']->value[3]->getProcedimento(),0,100);?>
...</p>
                                    </div>
                                </div>
                            <?php }?>
                            <!-- Blog post-->
                            <?php if (count($_smarty_tpl->tpl_vars['ricette']->value) == 5) {?>
                                <div class="card mb-4">
                                    <a href="/chefskiss/Ricette/InfoRicetta/<?php echo $_smarty_tpl->tpl_vars['ricette']->value[4]->getId();?>
"><img class="card-img-top" src="data:<?php echo $_smarty_tpl->tpl_vars['immagini']->value[4]->getTipo();?>
;base64,<?php echo $_smarty_tpl->tpl_vars['immagini']->value[4]->getImmagine();?>
" width=900 height=400 alt="..." /></a>
                                    <div class="card-body">
                                        <div class="small text-muted"><?php echo $_smarty_tpl->tpl_vars['ricette']->value[4]->getData_();?>
 &middot;
                                            <?php
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);
$_smarty_tpl->tpl_vars['i']->value = 0;
if ($_smarty_tpl->tpl_vars['i']->value < (int) $_smarty_tpl->tpl_vars['ricette']->value[4]->getValutazione()) {
for ($_foo=true;$_smarty_tpl->tpl_vars['i']->value < (int) $_smarty_tpl->tpl_vars['ricette']->value[4]->getValutazione(); $_smarty_tpl->tpl_vars['i']->value++) {
?>
                                                <i class="bi bi-star"></i>
                                            <?php }
}
?>
                                            </div>
                                        <h2 class="card-title h4"><?php echo $_smarty_tpl->tpl_vars['ricette']->value[4]->getNomeRicetta();?>
</h2>
                                        <p class="card-text"><?php echo substr($_smarty_tpl->tpl_vars['ricette']->value[4]->getProcedimento(),0,100);?>
...</p>
                                    </div>
                                </div>
                            <?php }?>
                        </div>
                        </div>
                    <!-- Pagination-->
                    <nav aria-label="Pagination">
                        <hr class="my-0" />
                        <ul class="pagination justify-content-center my-4">
                            <?php if ($_smarty_tpl->tpl_vars['index']->value == 1) {?>
                                <li class="page-item disabled"><a class="page-link" href="#" tabindex="-1" aria-disabled="true">Back</a></li>
                                <li class="page-item active" aria-current="page"><a class="page-link" href="/chefskiss/Ricette/EsploraLeRicette/<?php echo $_smarty_tpl->tpl_vars['index']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['index']->value;?>
</a></li>
                                <li class="page-item"><a class="page-link" href="/chefskiss/Ricette/EsploraLeRicette/<?php echo $_smarty_tpl->tpl_vars['index']->value+1;?>
"><?php echo $_smarty_tpl->tpl_vars['index']->value+1;?>
</a></li>
                                <?php if ($_smarty_tpl->tpl_vars['index']->value+2 < $_smarty_tpl->tpl_vars['num_pagine']->value) {?>
                                    <li class="page-item"><a class="page-link" href="/chefskiss/Ricette/EsploraLeRicette/<?php echo $_smarty_tpl->tpl_vars['index']->value+2;?>
"><?php echo $_smarty_tpl->tpl_vars['index']->value+2;?>
</a></li>
                                <?php }?>
                            <?php } else { ?>
                                <li class="page-item"><a class="page-link" href="/chefskiss/Ricette/EsploraLeRicette/<?php echo $_smarty_tpl->tpl_vars['index']->value-1;?>
" tabindex="-1" aria-disabled="true">Back</a></li>
                                <li class="page-item" aria-current="page"><a class="page-link" href="/chefskiss/Ricette/EsploraLeRicette/<?php echo $_smarty_tpl->tpl_vars['index']->value-1;?>
"><?php echo $_smarty_tpl->tpl_vars['index']->value-1;?>
</a></li>
                                <li class="page-item active"><a class="page-link" href="/chefskiss/Ricette/EsploraLeRicette/<?php echo $_smarty_tpl->tpl_vars['index']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['index']->value;?>
</a></li>
                                <?php if ($_smarty_tpl->tpl_vars['index']->value+1 < $_smarty_tpl->tpl_vars['num_pagine']->value) {?>
                                    <li class="page-item"><a class="page-link" href="/chefskiss/Ricette/EsploraLeRicette/<?php echo $_smarty_tpl->tpl_vars['index']->value+1;?>
"><?php echo $_smarty_tpl->tpl_vars['index']->value+1;?>
</a></li>
                                <?php }?>
                            <?php }?>
                            <?php if ($_smarty_tpl->tpl_vars['num_pagine']->value <= $_smarty_tpl->tpl_vars['index']->value+1 && $_smarty_tpl->tpl_vars['num_pagine']->value != $_smarty_tpl->tpl_vars['index']->value) {?>
                                <li class="page-item"><a class="page-link" href="/chefskiss/Ricette/EsploraLeRicette/<?php echo $_smarty_tpl->tpl_vars['num_pagine']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['num_pagine']->value;?>
</a></li>
                            <?php } elseif ($_smarty_tpl->tpl_vars['index']->value < $_smarty_tpl->tpl_vars['num_pagine']->value-1) {?>
                                <li class="page-item disabled"><a class="page-link" href="#!">...</a></li>
                                <li class="page-item"><a class="page-link" href="/chefskiss/Ricette/EsploraLeRicette/<?php echo $_smarty_tpl->tpl_vars['num_pagine']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['num_pagine']->value;?>
</a></li>
                            <?php }?>

                            <li class="page-item"><a class="page-link" href="/chefskiss/Ricette/EsploraLeRicette/<?php echo $_smarty_tpl->tpl_vars['index']->value+1;?>
">Next</a></li>
                        </ul>
                    </nav>
                </div>
                <!-- Side widgets-->
                <div class="col-lg-4">
                    <!-- Search widget-->
                    <div class="card mb-4">
                        <div class="card-header">Search</div>
                        <div class="card-body">
                        <form method="POST" action="/chefskiss/Ricette/cerca">
                            <div class="input-group">
                                <input class="form-control" name="text" type="text" placeholder="Enter search term..." aria-label="Enter search term..." aria-describedby="button-search" />
                                <button class="btn btn-primary" id="button-search" type="submit">Go!</button>
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
                                        <li><a href="/chefskiss/Ricette/cerca/primi">Primi</a></li>
                                        <li><a href="/chefskiss/Ricette/cerca/contorni">Contorni</a></li>
                                        <li><a href="/chefskiss/Ricette/cerca/antipasti">Antipasti</a></li>
                                    </ul>
                                </div>
                                <div class="col-sm-6">
                                    <ul class="list-unstyled mb-0">
                                        <li><a href="/chefskiss/Ricette/cerca/secondi">Secondi</a></li>
                                        <li><a href="/chefskiss/Ricette/cerca/dessert">Dessert</a></li>
                                        <li><a href="/chefskiss/Ricette/cerca/salse">Salse</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Side widget-->
                    <!--<div class="card mb-4">
                        <div class="card-header">Side Widget</div>
                        <div class="card-body">You can put anything you want inside of these side widgets. They are easy to use, and feature the Bootstrap 5 card component!</div>
                    </div>-->
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
    </body>
</html>
<?php }
}
