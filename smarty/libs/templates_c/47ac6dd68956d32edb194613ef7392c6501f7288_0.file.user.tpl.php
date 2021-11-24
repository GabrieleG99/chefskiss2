<?php
/* Smarty version 3.1.39, created on 2021-11-24 15:28:49
  from 'C:\xampp\htdocs\chefskiss\smarty\libs\templates\user.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_619e4c21f277f0_26661836',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '47ac6dd68956d32edb194613ef7392c6501f7288' => 
    array (
      0 => 'C:\\xampp\\htdocs\\chefskiss\\smarty\\libs\\templates\\user.tpl',
      1 => 1637600358,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_619e4c21f277f0_26661836 (Smarty_Internal_Template $_smarty_tpl) {
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
                            <a class="nav-link" href="/chefskiss/Utente/profilo">Profilo</a>
                        </li>
                        <li class="nav-item text-light">
                            <a class="nav-link" href="/chefskiss/Utente/logout">Disconnetti</a>
                        </li>
                    <?php } else { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="/chefskiss/Utente/logout">Disconnetti</a>
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
                <div class="pro-img"><img src="data:<?php echo $_smarty_tpl->tpl_vars['immagine']->value->getTipo();?>
;base64,<?php echo $_smarty_tpl->tpl_vars['immagine']->value->getImmagine();?>
" alt="user"></div><!--./smarty/libs/assets/background_profilo.jpg-->
                <div class="ms-3">
                    <h3 class="m-b-0"><?php echo $_smarty_tpl->tpl_vars['utente']->value->getNome();?>
 <?php echo $_smarty_tpl->tpl_vars['utente']->value->getCognome();?>
</h3>
                    <?php if ($_smarty_tpl->tpl_vars['utente']->value->getPrivilegi() == 1&$_smarty_tpl->tpl_vars['utente']->value->getBan() == 0) {?>
                        <p class="text-muted">Membro</p>
                        <a class="nav-link" href="/chefskiss/Admin/nuovoModeratore/<?php echo $_smarty_tpl->tpl_vars['utente']->value->getId();?>
"> Rendi Moderatore</a>

                        <form name="form" action="/chefskiss/Admin/bannaUtente/<?php echo $_smarty_tpl->tpl_vars['utente']->value->getId();?>
" method="post">
                            <p>Banna utente fino al</p>
                            <input type="date"  name="date" value="">
                            <button type="submit">Invia</button>
                        </form>


                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['utente']->value->getPrivilegi() == 2) {?>
                        <p class="text-muted">Moderatore</p>
                        <a class="nav-link" href="/chefskiss/Admin/togliModeratore/<?php echo $_smarty_tpl->tpl_vars['utente']->value->getId();?>
"> Rimuovi Moderatore</a>
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['utente']->value->getPrivilegi() == 3) {?>
                        <p class="text-muted">Amministratore</p>
                    <?php }?>

                </div>
                <?php if ($_smarty_tpl->tpl_vars['utente']->value->getBan() == true) {?>
                    <p class="text-muted">Utente bannato fino al <?php echo $_smarty_tpl->tpl_vars['utente']->value->getDataFineBan();?>
</p>
                    <a class="nav-link" href="/chefskiss/Admin/rimuoviBan/<?php echo $_smarty_tpl->tpl_vars['utente']->value->getId();?>
"> Rimuovi Ban</a>
                <?php }?>





                </div>
            </div>
        </div>
    </div>
</div>
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
