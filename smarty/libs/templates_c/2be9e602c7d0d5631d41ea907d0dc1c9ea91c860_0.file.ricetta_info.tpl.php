<?php
/* Smarty version 3.1.39, created on 2021-10-06 19:39:14
  from 'C:\xampp\htdocs\chefskiss\smarty\libs\templates\ricetta_info.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_615ddf42e44778_86504760',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2be9e602c7d0d5631d41ea907d0dc1c9ea91c860' => 
    array (
      0 => 'C:\\xampp\\htdocs\\chefskiss\\smarty\\libs\\templates\\ricetta_info.tpl',
      1 => 1633541952,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_615ddf42e44778_86504760 (Smarty_Internal_Template $_smarty_tpl) {
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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="/chefskiss/smarty/libs/css/boot_styles.css" rel="stylesheet" type="text/css"/>
</head>
<body class="d-flex flex-column">
<main class="flex-shrink-0">
    <!-- Navigation-->
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
            <section class="py-5">
                <div class="container px-5 my-5">
                    <div class="row gx-5">
                        <div class="col-lg-3">
                            <div class="d-flex align-items-center mt-lg-5 mb-4">
                                <img class="img-fluid rounded-circle" src="data:<?php echo $_smarty_tpl->tpl_vars['immagine_autore']->value->getTipo();?>
;base64,<?php echo $_smarty_tpl->tpl_vars['immagine_autore']->value->getImmagine();?>
" width=40 height=40 alt="..." />
                                <div class="ms-3">
                                    <div class="fw-bold"><?php echo $_smarty_tpl->tpl_vars['utente']->value->getNome();?>
 <?php echo $_smarty_tpl->tpl_vars['utente']->value->getCognome();?>
</div>
                                    <?php if ($_smarty_tpl->tpl_vars['utente']->value->getPrivilegi() == 1) {?>
                                        <div class="text-muted">Membro</div>
                                    <?php }?>
                                    <?php if ($_smarty_tpl->tpl_vars['utente']->value->getPrivilegi() == 2) {?>
                                        <div class="text-muted">Moderatore</div>
                                    <?php }?>
                                    <?php if ($_smarty_tpl->tpl_vars['utente']->value->getPrivilegi() == 3) {?>
                                        <div class="text-muted">Amministratore</div>
                                    <?php }?>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-9">
                            <!-- Post content-->
                            <article>
                                <!-- Post header-->
                                <header class="mb-4">
                                    <!-- Post title-->
                                    <h1 class="fw-bolder mb-1"><?php echo $_smarty_tpl->tpl_vars['ricetta']->value->getNomeRicetta();?>
</h1>
                                    <!-- Post meta content-->
                                    <div class="text-muted fst-italic mb-2"><?php echo $_smarty_tpl->tpl_vars['ricetta']->value->getData_();?>
 &middot; 
                                    <?php
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);
$_smarty_tpl->tpl_vars['i']->value = 0;
if ($_smarty_tpl->tpl_vars['i']->value < (int)$_smarty_tpl->tpl_vars['ricetta']->value->getValutazione()) {
for ($_foo=true;$_smarty_tpl->tpl_vars['i']->value < (int)$_smarty_tpl->tpl_vars['ricetta']->value->getValutazione(); $_smarty_tpl->tpl_vars['i']->value++) {
?>
                                        <i class="bi bi-star"></i>
                                    <?php }
}
?>
                                    </div>
                                    <!-- Post categories-->
                                    <a class="badge bg-secondary text-decoration-none link-light" href="#!"><?php echo ucfirst($_smarty_tpl->tpl_vars['ricetta']->value->getCategoria());?>
</a>
                                </header>
                                <!-- Preview image figure-->
                                <figure class="mb-4"><img class="img-fluid rounded" src="data:<?php echo $_smarty_tpl->tpl_vars['immagine']->value->getTipo();?>
;base64,<?php echo $_smarty_tpl->tpl_vars['immagine']->value->getImmagine();?>
" width=900 height=400 alt="..." /></figure>
                                <ul>
                                    <?php
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);
$_smarty_tpl->tpl_vars['i']->value = 0;
if ($_smarty_tpl->tpl_vars['i']->value < count($_smarty_tpl->tpl_vars['ricetta']->value->parseIngredienti())) {
for ($_foo=true;$_smarty_tpl->tpl_vars['i']->value < count($_smarty_tpl->tpl_vars['ricetta']->value->parseIngredienti()); $_smarty_tpl->tpl_vars['i']->value++) {
?>
                                        <?php $_smarty_tpl->_assignInScope('ingredienti', $_smarty_tpl->tpl_vars['ricetta']->value->parseIngredienti());?>
                                        <li> <?php echo $_smarty_tpl->tpl_vars['ingredienti']->value[$_smarty_tpl->tpl_vars['i']->value];?>
 </li>
                                    <?php }
}
?>
                                </ul>
                                <!-- Post content-->
                                <section class="mb-5">
                                    <?php
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);
$_smarty_tpl->tpl_vars['i']->value = 0;
if ($_smarty_tpl->tpl_vars['i']->value < count($_smarty_tpl->tpl_vars['procedimento']->value)) {
for ($_foo=true;$_smarty_tpl->tpl_vars['i']->value < count($_smarty_tpl->tpl_vars['procedimento']->value); $_smarty_tpl->tpl_vars['i']->value++) {
?>
                                        <p class="fs-5 mb-4"><?php echo $_smarty_tpl->tpl_vars['procedimento']->value[$_smarty_tpl->tpl_vars['i']->value];?>
</p>
                                    <?php }
}
?>
                                </section>
                            </article>
                            <!-- Comments section-->
                            <section>
                                <div class="card bg-light">
                                    <div class="card-body">
                                        <!-- Comment form-->
                                        <form class="mb-4" METHOD="post" action="/chefskiss/Ricette/InserisciRecensione">
                                            <textarea class="form-control" rows="3" placeholder="Join the discussion and leave a comment!" name="text_comment" required></textarea>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="stars"> 
                                                        <div class="text-muted">Dai un voto alla ricetta!</div>
                                                        <input class="star star-5" id="star-5" type="radio" name="star" value="5"/> <label class="star star-5" for="star-5"></label> <input class="star star-4" id="star-4" type="radio" name="star" value="4"/> <label class="star star-4" for="star-4"></label> <input class="star star-3" id="star-3" type="radio" name="star" value="3"/> <label class="star star-3" for="star-3"></label> <input class="star star-2" id="star-2" type="radio" name="star" value="2"/> <label class="star star-2" for="star-2"></label> <input class="star star-1" id="star-1" type="radio" name="star" value="1"/> <label class="star star-1" for="star-1"></label>
                                                    </div>
                                                </div>
                                            </div>
                                            <button class="rounded-1 border" type="submit">Invia</button>
                                        </form>
                                        <?php if ($_smarty_tpl->tpl_vars['array']->value) {?>
                                            <?php if (is_array($_smarty_tpl->tpl_vars['array']->value)) {?>
                                                <?php if (is_array($_smarty_tpl->tpl_vars['array']->value[0])) {?>
                                                    <?php
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);
$_smarty_tpl->tpl_vars['i']->value = 0;
if ($_smarty_tpl->tpl_vars['i']->value < sizeof($_smarty_tpl->tpl_vars['array']->value[0])) {
for ($_foo=true;$_smarty_tpl->tpl_vars['i']->value < sizeof($_smarty_tpl->tpl_vars['array']->value[0]); $_smarty_tpl->tpl_vars['i']->value++) {
?>
                                                        <div class="d-flex">
                                                            <div class="flex-shrink-0"><img class="rounded-circle" src="data:<?php echo $_smarty_tpl->tpl_vars['array']->value[2][$_smarty_tpl->tpl_vars['i']->value]->getTipo();?>
;base64,<?php echo $_smarty_tpl->tpl_vars['array']->value[2][$_smarty_tpl->tpl_vars['i']->value]->getImmagine();?>
" width=40 height=40 alt="..." /></div>
                                                            <div class="ms-3">
                                                                <div class="fw-bold"><?php echo $_smarty_tpl->tpl_vars['array']->value[1][$_smarty_tpl->tpl_vars['i']->value]->getNome();?>
 <?php echo $_smarty_tpl->tpl_vars['array']->value[1][$_smarty_tpl->tpl_vars['i']->value]->getCognome();?>
</div>
                                                                <?php echo $_smarty_tpl->tpl_vars['array']->value[0][$_smarty_tpl->tpl_vars['i']->value]->getCommento();?>
 <div class="text-end d-flex"><?php echo $_smarty_tpl->tpl_vars['array']->value[0][$_smarty_tpl->tpl_vars['i']->value]->getData_pubblicazione();?>
</div>
                                                            </div>
                                                        </div>
                                                    <?php }
}
?>
                                                <?php } else { ?>
                                                <div class="d-flex">
                                                    <div class="flex-shrink-0"><img class="rounded-circle" src="data:<?php echo $_smarty_tpl->tpl_vars['array']->value[2]->getTipo();?>
;base64,<?php echo $_smarty_tpl->tpl_vars['array']->value[2]->getImmagine();?>
" width=40 height=40 alt="..." /></div>
                                                    <div class="ms-3">
                                                        <div class="fw-bold"><?php echo $_smarty_tpl->tpl_vars['array']->value[1]->getNome();?>
 <?php echo $_smarty_tpl->tpl_vars['array']->value[1]->getCognome();?>
</div>
                                                        <?php echo $_smarty_tpl->tpl_vars['array']->value[0]->getCommento();?>
 <div class="text-end"><?php echo $_smarty_tpl->tpl_vars['array']->value[0]->getData_pubblicazione();?>
</div>
                                                    </div>
                                                </div>
                                                <?php }?>
                                            <?php }?>
                                        <?php }?>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </section>
        </main>
        <!-- Footer-->
        <footer class="bg-dark py-4 mt-auto">
            <div class="container px-5">
                <div class="row align-items-center justify-content-between flex-column flex-sm-row">
                    <div class="col-auto"><div class="small m-0 text-white">Copyright &copy; Your Website 2021</div></div>
                    <div class="col-auto">
                        <a class="link-light small" href="#!">Privacy</a>
                        <span class="text-white mx-1">&middot;</span>
                        <a class="link-light small" href="#!">Terms</a>
                        <span class="text-white mx-1">&middot;</span>
                        <a class="link-light small" href="#!">Contact</a>
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
