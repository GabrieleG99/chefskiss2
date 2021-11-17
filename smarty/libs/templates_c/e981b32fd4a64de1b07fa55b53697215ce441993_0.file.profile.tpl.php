<?php
/* Smarty version 3.1.39, created on 2021-11-12 17:09:08
  from '/Applications/XAMPP/xamppfiles/htdocs/chefskiss/smarty/libs/templates/profile.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_618e91a4c65134_07680848',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e981b32fd4a64de1b07fa55b53697215ce441993' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/chefskiss/smarty/libs/templates/profile.tpl',
      1 => 1636733317,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_618e91a4c65134_07680848 (Smarty_Internal_Template $_smarty_tpl) {
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
        <link rel="icon" type="image/x-icon" href="/chefskiss/smarty/libs/assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="/chefskiss/smarty/libs/css/profile.css" rel="stylesheet" type="text/css"/>
        <link href="/chefskiss/smarty/libs/css/boot_styles.css" rel="stylesheet" type="text/css"/>

    </head>
    <body class="d-flex flex-column">
        <main class="flex-shrink-0">
            <!-- Navigation-->
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <div class="container px-5">
                <img class="rounded-circle" src="/chefskiss/smarty/libs/assets/logo.png" width="40" height="40">
                <a class="navbar-brand px-sm-3" href="/chefskiss/">Chef's Kiss</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item"><a class="nav-link" href="/chefskiss/">Home</a></li>
                            <li class="nav-item"><a class="nav-link" href="/chefskiss/Contact/contattaci">Contact</a></li>
                            <li class="nav-item"><a class="nav-link" href="/chefskiss/Forum/esploraLeDomande">Forum</a></li>
                            <li class="nav-item"><a class="nav-link" href="/chefskiss/Ricette/esplora">Ricette</a></li>
                            <?php if ($_smarty_tpl->tpl_vars['userlogged']->value != 'nouser') {?>
                                <li class="nav-item text-light">
                                    <a class="nav-link" href="/chefskiss/Ricette/nuovaRicetta">Nuova Ricetta</a>
                                </li>
                                <li class="nav-item text-light">
                                    <a class="nav-link" href="/chefskiss/Forum/nuovaDomanda">Nuova Domanda</a>
                                </li>
                                <li class="nav-item text-light">
                                    <?php if ($_smarty_tpl->tpl_vars['utente']->value->getPrivilegi() == 3) {?>
                                        <a class="nav-link" href="/chefskiss/Admin/homepage">Amministratore</a>

                                    <?php } else { ?>
                                    <a class="nav-link" href="/chefskiss/Utente/profilo">Profilo</a>
                                    <?php }?>
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
        </main>
            <div class="padding">
                <div class="col-md-8">
                    <!-- Column -->
                    <div class="card"> <img class="card-img-top" src="https://i.imgur.com/K7A78We.jpg" alt="Card image cap">
                        <div class="card-body little-profile text-center">
                            <div class="pro-img"><img src="data:<?php echo $_smarty_tpl->tpl_vars['immagine_utente']->value->getTipo();?>
;base64,<?php echo $_smarty_tpl->tpl_vars['immagine_utente']->value->getImmagine();?>
" width=40 height=40 alt="user"></div>
                            <div class="ms-3">
                                <h3 class="m-b-0"><?php echo $_smarty_tpl->tpl_vars['utente']->value->getNome();?>
 <?php echo $_smarty_tpl->tpl_vars['utente']->value->getCognome();?>
</h3>
                                <?php if ($_smarty_tpl->tpl_vars['utente']->value->getPrivilegi() == 1) {?>
                                    <p class="text-muted">Membro</p>
                                <?php }?>
                                <?php if ($_smarty_tpl->tpl_vars['utente']->value->getPrivilegi() == 2) {?>
                                    <p class="text-muted">Moderatore</p>
                                <?php }?>
                                <?php if ($_smarty_tpl->tpl_vars['utente']->value->getPrivilegi() == 3) {?>
                                    <p class="text-muted">Amministratore</p>
                                <?php }?>
                            </div>
                            <?php if ($_smarty_tpl->tpl_vars['idutente']->value == null) {?>
                            <button class="border rounded-2 btn-outline-light">
                                <a class="nav-link" href="/chefskiss/Utente/modificaProfilo"> Modifica Profilo </a>
                            </button>   
                            <?php }?>
                            <div class="ms-3">
                                <?php if ($_smarty_tpl->tpl_vars['ricette']->value != null) {?>
                                    <?php if (is_array($_smarty_tpl->tpl_vars['ricette']->value)) {?>
                                        <h3 class="m-b-0 font-light"><?php echo sizeof($_smarty_tpl->tpl_vars['ricette']->value);?>
</h3><small>Ricette Pubblicate</small>
                                    <?php } else { ?>
                                        <h3 class="m-b-0 font-light">1</h3><small>Ricetta Pubblicata</small>
                                    <?php }?>
                                <?php }?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--Sezione Ricette Utente-->
            <section class="py-5">
                <div class="container px-5">
                    <h2 class="fw-bolder fs-5 mb-4">Le Ricette di <?php echo $_smarty_tpl->tpl_vars['utente']->value->getNome();?>
</h2>
                    <div class="row gx-5">
                        <?php if ($_smarty_tpl->tpl_vars['ricette']->value) {?>
                            <?php if (is_array($_smarty_tpl->tpl_vars['ricette']->value)) {?>
                                <?php
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);
$_smarty_tpl->tpl_vars['i']->value = 0;
if ($_smarty_tpl->tpl_vars['i']->value < sizeof($_smarty_tpl->tpl_vars['ricette']->value)) {
for ($_foo=true;$_smarty_tpl->tpl_vars['i']->value < sizeof($_smarty_tpl->tpl_vars['ricette']->value); $_smarty_tpl->tpl_vars['i']->value++) {
?>
                                    <div class="col-lg-4 mb-5">
                                        <div class="card h-100 shadow border-0">
                                            <img class="card-img-top" src="data:<?php echo $_smarty_tpl->tpl_vars['immagini']->value[$_smarty_tpl->tpl_vars['i']->value]->getTipo();?>
;base64,<?php echo $_smarty_tpl->tpl_vars['immagini']->value[$_smarty_tpl->tpl_vars['i']->value]->getImmagine();?>
" width=600 height=350 alt="..." />
                                            <div class="card-body p-4">
                                                <div class="badge bg-primary bg-gradient rounded-pill mb-2"><?php echo $_smarty_tpl->tpl_vars['ricette']->value[$_smarty_tpl->tpl_vars['i']->value]->getCategoria();?>
</div>
                                                <a class="text-decoration-none link-dark stretched-link" href="/chefskiss/Ricette/InfoRicetta/<?php echo $_smarty_tpl->tpl_vars['ricette']->value[$_smarty_tpl->tpl_vars['i']->value]->getId();?>
"><div class="h5 card-title mb-3"><?php echo $_smarty_tpl->tpl_vars['ricette']->value[$_smarty_tpl->tpl_vars['i']->value]->getNomeRicetta();?>
</div></a>
                                                <p class="card-text mb-0"><?php echo substr($_smarty_tpl->tpl_vars['ricette']->value[$_smarty_tpl->tpl_vars['i']->value]->getProcedimento(),0,100);?>
...</p>
                                            </div>
                                            <div class="card-footer p-4 pt-0 bg-transparent border-top-0">
                                                <div class="d-flex align-items-end justify-content-between">
                                                    <div class="d-flex align-items-center">
                                                        <img class="rounded-circle me-3" src="data:<?php echo $_smarty_tpl->tpl_vars['immagini_autori']->value[$_smarty_tpl->tpl_vars['i']->value]->getTipo();?>
;base64,<?php echo $_smarty_tpl->tpl_vars['immagini_autori']->value[$_smarty_tpl->tpl_vars['i']->value]->getImmagine();?>
" width=40 height=40 alt="..." />
                                                        <div class="small">
                                                            <div class="fw-bold"><?php echo $_smarty_tpl->tpl_vars['utente']->value->getNome();?>
 <?php echo $_smarty_tpl->tpl_vars['utente']->value->getCognome();?>
</div>
                                                            <div class="text-muted"><?php echo $_smarty_tpl->tpl_vars['ricette']->value[$_smarty_tpl->tpl_vars['i']->value]->getData_();?>
 &middot; Per <?php echo $_smarty_tpl->tpl_vars['ricette']->value[$_smarty_tpl->tpl_vars['i']->value]->getDosiPersone();?>
 persone &middot;
                                                            <?php
$_smarty_tpl->tpl_vars['j'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);
$_smarty_tpl->tpl_vars['j']->value = 0;
if ($_smarty_tpl->tpl_vars['j']->value < (int) $_smarty_tpl->tpl_vars['ricette']->value[$_smarty_tpl->tpl_vars['i']->value]->getValutazione()) {
for ($_foo=true;$_smarty_tpl->tpl_vars['j']->value < (int) $_smarty_tpl->tpl_vars['ricette']->value[$_smarty_tpl->tpl_vars['i']->value]->getValutazione(); $_smarty_tpl->tpl_vars['j']->value++) {
?>
                                                                <i class="bi bi-star"></i>
                                                            <?php }
}
?>
                                                            <?php if ($_smarty_tpl->tpl_vars['ricette']->value[$_smarty_tpl->tpl_vars['i']->value]->getValutazione() == 0) {?>
                                                                ancora nessuna recensione
                                                            <?php }?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php }
}
?>
                                <?php } else { ?>
                                    <div class="col-lg-4 mb-5">
                                        <div class="card h-100 shadow border-0">
                                            <img class="card-img-top" src="data:<?php echo $_smarty_tpl->tpl_vars['immagini']->value->getTipo();?>
;base64,<?php echo $_smarty_tpl->tpl_vars['immagini']->value->getImmagine();?>
" width=600 height=350 alt="..." />
                                            <div class="card-body p-4">
                                                <div class="badge bg-primary bg-gradient rounded-pill mb-2"><?php echo $_smarty_tpl->tpl_vars['ricette']->value->getCategoria();?>
</div>
                                                <a class="text-decoration-none link-dark stretched-link" href="/chefskiss/Ricette/InfoRicetta/<?php echo $_smarty_tpl->tpl_vars['ricette']->value->getId();?>
"><div class="h5 card-title mb-3"><?php echo $_smarty_tpl->tpl_vars['ricette']->value->getNomeRicetta();?>
</div></a>
                                                <p class="card-text mb-0"><?php echo substr($_smarty_tpl->tpl_vars['ricette']->value->getProcedimento(),0,100);?>
...</p>
                                            </div>
                                            <div class="card-footer p-4 pt-0 bg-transparent border-top-0">
                                                <div class="d-flex align-items-end justify-content-between">
                                                    <div class="d-flex align-items-center">
                                                        <img class="rounded-circle me-3" src="data:<?php echo $_smarty_tpl->tpl_vars['immagini_autori']->value->getTipo();?>
;base64,<?php echo $_smarty_tpl->tpl_vars['immagini_autori']->value->getImmagine();?>
" width=40 height=40 alt="..." />
                                                        <div class="small">
                                                            <div class="fw-bold"><?php echo $_smarty_tpl->tpl_vars['utente']->value->getNome();?>
 <?php echo $_smarty_tpl->tpl_vars['utente']->value->getCognome();?>
</div>
                                                            <div class="text-muted"><?php echo $_smarty_tpl->tpl_vars['ricette']->value->getData_();?>
 &middot; Per <?php echo $_smarty_tpl->tpl_vars['ricette']->value->getDosiPersone();?>
 persone</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            <?php }?>
                            <?php } else { ?>
                            <h2> L'utente non ha ancora pubblicato ricette</h2>
                        <?php }?>
                    </div>
                </div>
        </section>
    </body>
</html>
<?php }
}
