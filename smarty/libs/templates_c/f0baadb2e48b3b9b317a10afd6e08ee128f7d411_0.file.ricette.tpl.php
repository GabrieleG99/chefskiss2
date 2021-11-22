<?php
/* Smarty version 3.1.39, created on 2021-11-22 17:12:11
  from 'C:\xampp\htdocs\chefskiss\smarty\libs\templates\ricette.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_619bc15b4b2606_42676154',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f0baadb2e48b3b9b317a10afd6e08ee128f7d411' => 
    array (
      0 => 'C:\\xampp\\htdocs\\chefskiss\\smarty\\libs\\templates\\ricette.tpl',
      1 => 1637597528,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_619bc15b4b2606_42676154 (Smarty_Internal_Template $_smarty_tpl) {
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
        <link rel="icon" type="image/x-icon" href="/chefskiss/smarty/libs/assets/chef-hat.png" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
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
            <!-- Page Content-->
            <?php if ($_smarty_tpl->tpl_vars['ricette']->value) {?>
                <?php if (is_array($_smarty_tpl->tpl_vars['ricette']->value)) {?>
                    <section class="py-5">
                        <div class="container px-5">
                            <h1 class="fw-bolder fs-5 mb-4">Le ricette</h1>
                            <div class="card border-0 shadow rounded-3 overflow-hidden">
                                <div class="card-body p-0">
                                    <div class="row gx-0">
                                        <div class="col-lg-6 col-xl-5 py-lg-5">
                                            <div class="p-4 p-md-5">
                                                <div class="badge bg-primary bg-gradient rounded-pill mb-2">Ricetta del giorno</div>
                                                <div class="h2 fw-bolder"><?php echo $_smarty_tpl->tpl_vars['ricette']->value[$_smarty_tpl->tpl_vars['ran_num']->value]->getNomeRicetta();?>
</div>
                                                <p><?php echo substr($_smarty_tpl->tpl_vars['ricette']->value[$_smarty_tpl->tpl_vars['ran_num']->value]->getProcedimento(),0,100);?>
...</p>
                                                <a class="stretched-link text-decoration-none" href="/chefskiss/Ricette/InfoRicetta/<?php echo $_smarty_tpl->tpl_vars['ricette']->value[$_smarty_tpl->tpl_vars['ran_num']->value]->getId();?>
">
                                                    Leggi tutta la ricetta
                                                    <i class="bi bi-arrow-right"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-xl-7"><div class="bg-featured-blog"> <img src="data:<?php echo $_smarty_tpl->tpl_vars['array']->value[2][$_smarty_tpl->tpl_vars['ran_num']->value]->getTipo();?>
;base64,<?php echo $_smarty_tpl->tpl_vars['array']->value[2][$_smarty_tpl->tpl_vars['ran_num']->value]->getImmagine();?>
" width=600 height=450></div></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <?php } else { ?>
                    <section class="py-5">
                        <div class="container px-5">
                            <h1 class="fw-bolder fs-5 mb-4">Le ricette</h1>
                            <div class="card border-0 shadow rounded-3 overflow-hidden">
                                <div class="card-body p-0">
                                    <div class="row gx-0">
                                        <div class="col-lg-6 col-xl-5 py-lg-5">
                                            <div class="p-4 p-md-5">
                                                <div class="badge bg-primary bg-gradient rounded-pill mb-2">Ricetta del giorno</div>
                                                <div class="h2 fw-bolder"><?php echo $_smarty_tpl->tpl_vars['ricette']->value->getNomeRicetta();?>
</div>
                                                <p><?php echo substr($_smarty_tpl->tpl_vars['ricette']->value->getProcedimento(),0,100);?>
...</p>
                                                <a class="stretched-link text-decoration-none" href="/chefskiss/Ricette/InfoRicetta/<?php echo $_smarty_tpl->tpl_vars['ricette']->value->getId();?>
">
                                                    Leggi tutta la ricetta
                                                    <i class="bi bi-arrow-right"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-xl-7"><div class="bg-featured-blog"> <img src="data:<?php echo $_smarty_tpl->tpl_vars['array']->value[2]->getTipo();?>
;base64,<?php echo $_smarty_tpl->tpl_vars['array']->value[2]->getImmagine();?>
" width=600 height=450></div></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                <?php }?>
                <?php } else { ?>
                    <section class="py-5">
                        <div class="container px-5">
                            <h1 class="fw-bolder fs-5 mb-4">Ancora nessuna ricetta da vedere!</h1>
                        </div>
                    </section>
            <?php }?>
            <!-- Blog preview section-->
            <section class="py-5">
                <div class="container px-5">
                    <?php if ($_smarty_tpl->tpl_vars['array']->value) {?>
                        <?php if (is_array($_smarty_tpl->tpl_vars['array']->value[0])) {?>
                            <h2 class="fw-bolder fs-5 mb-4">Esplora le ricette</h2>
                            <div class="row gx-5">
                                <?php
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);
$_smarty_tpl->tpl_vars['i']->value = 0;
if ($_smarty_tpl->tpl_vars['i']->value < 3) {
for ($_foo=true;$_smarty_tpl->tpl_vars['i']->value < 3; $_smarty_tpl->tpl_vars['i']->value++) {
?>
                                    <div class="col-lg-4 mb-5">
                                        <div class="card h-100 shadow border-0">
                                            <img class="card-img-top" src="data:<?php echo $_smarty_tpl->tpl_vars['array']->value[2][$_smarty_tpl->tpl_vars['i']->value]->getTipo();?>
;base64,<?php echo $_smarty_tpl->tpl_vars['array']->value[2][$_smarty_tpl->tpl_vars['i']->value]->getImmagine();?>
" width=600 height=350 alt="..." />
                                            <div class="card-body p-4">
                                                <div class="badge bg-primary bg-gradient rounded-pill mb-2"><?php echo $_smarty_tpl->tpl_vars['array']->value[0][$_smarty_tpl->tpl_vars['i']->value]->getCategoria();?>
</div>
                                                <a class="text-decoration-none link-dark stretched-link" href="InfoRicetta/<?php echo $_smarty_tpl->tpl_vars['array']->value[0][$_smarty_tpl->tpl_vars['i']->value]->getId();?>
"><div class="h5 card-title mb-3"><?php echo $_smarty_tpl->tpl_vars['array']->value[0][$_smarty_tpl->tpl_vars['i']->value]->getNomeRicetta();?>
</div></a>
                                                <p class="card-text mb-0"><?php echo substr($_smarty_tpl->tpl_vars['array']->value[0][$_smarty_tpl->tpl_vars['i']->value]->getProcedimento(),0,100);?>
...</p>
                                            </div>
                                            <div class="card-footer p-4 pt-0 bg-transparent border-top-0">
                                                <div class="d-flex align-items-end justify-content-between">
                                                    <div class="d-flex align-items-center">
                                                        <img class="rounded-circle me-3" src="data:<?php echo $_smarty_tpl->tpl_vars['array']->value[3][$_smarty_tpl->tpl_vars['i']->value]->getTipo();?>
;base64,<?php echo $_smarty_tpl->tpl_vars['array']->value[3][$_smarty_tpl->tpl_vars['i']->value]->getImmagine();?>
" width=40 height=40 alt="..." />
                                                        <div class="small">
                                                            <div class="fw-bold"><?php echo $_smarty_tpl->tpl_vars['array']->value[1][$_smarty_tpl->tpl_vars['i']->value]->getNome();?>
 <?php echo $_smarty_tpl->tpl_vars['array']->value[1][$_smarty_tpl->tpl_vars['i']->value]->getCognome();?>
</div>
                                                            <div class="text-muted"><?php echo $_smarty_tpl->tpl_vars['array']->value[0][$_smarty_tpl->tpl_vars['i']->value]->getData_();?>
 &middot; Per <?php echo $_smarty_tpl->tpl_vars['array']->value[0][$_smarty_tpl->tpl_vars['i']->value]->getDosiPersone();?>
 persone &middot; 
                                                            <?php
$_smarty_tpl->tpl_vars['x'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);
$_smarty_tpl->tpl_vars['x']->value = 0;
if ($_smarty_tpl->tpl_vars['x']->value < (int)$_smarty_tpl->tpl_vars['array']->value[0][$_smarty_tpl->tpl_vars['i']->value]->getValutazione()) {
for ($_foo=true;$_smarty_tpl->tpl_vars['x']->value < (int)$_smarty_tpl->tpl_vars['array']->value[0][$_smarty_tpl->tpl_vars['i']->value]->getValutazione(); $_smarty_tpl->tpl_vars['x']->value++) {
?>
                                                                <i class="bi bi-star"></i>
                                                            <?php }
}
?>
                                                            <?php if ($_smarty_tpl->tpl_vars['array']->value[0][$_smarty_tpl->tpl_vars['i']->value]->getValutazione() == 0) {?>
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
                            <?php }?>
                        <?php }?>

                        <div class="text-end mb-5 mb-xl-0">
                            <a class="text-decoration-none" href="/chefskiss/Ricette/EsploraLeRicette">
                                Tutte le ricette
                                <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </section>
        </main>
        <!-- Footer-->
            <footer class="bg-dark py-4 mt-auto">
                <div class="container px-5">
                    <div class="row align-items-center justify-content-between flex-column flex-sm-row">
                        <div class="col-auto"><div class="small m-0 text-white">Copyright &copy; Chef's Kiss 2021</div></div>
                        <div class="col-auto">
                            <!--<a class="link-light small" href="#!">Privacy</a>
                            <span class="text-white mx-1">&middot;</span>
                            <a class="link-light small" href="#!">Terms</a>
                            <span class="text-white mx-1">&middot;</span>-->
                            <a class="link-light small" href="/chefskiss/Contact/contattaci">Contact</a>
                        </div>
                    </div>
                </div>
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
