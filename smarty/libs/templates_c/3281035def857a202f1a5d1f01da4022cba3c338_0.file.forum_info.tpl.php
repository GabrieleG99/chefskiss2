<?php
/* Smarty version 3.1.39, created on 2021-11-08 17:55:28
  from '/Applications/XAMPP/xamppfiles/htdocs/chefskiss/smarty/libs/templates/forum_info.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_61895680d39c58_83503297',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3281035def857a202f1a5d1f01da4022cba3c338' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/chefskiss/smarty/libs/templates/forum_info.tpl',
      1 => 1636390528,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61895680d39c58_83503297 (Smarty_Internal_Template $_smarty_tpl) {
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
        <link href="/chefskiss/smarty/libs/css/boot_styles.css" rel="stylesheet" />
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
                            <!--<li class="nav-item"><a class="nav-link" href="about.html">About</a></li>-->
                            <li class="nav-item"><a class="nav-link" href="/chefskiss/Contact/contattaci">Contact</a></li>
                            <!--<li class="nav-item"><a class="nav-link" href="pricing.html">Pricing</a></li>-->
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
                            <?php ob_start();
echo $_smarty_tpl->tpl_vars['mod']->value != null && $_smarty_tpl->tpl_vars['mod']->value->getPrivilegi() >= 2;
$_prefixVariable1 = ob_get_clean();
if ($_prefixVariable1) {?>
                                <button class="border rounded-2 btn-outline-light my-3">
                                    <a class="nav-link" href="/chefskiss/Moderatore/rimuoviPost/<?php echo $_smarty_tpl->tpl_vars['post']->value->getId();?>
/<?php echo $_smarty_tpl->tpl_vars['post']->value->getId_immagine();?>
"> Rimuovi Post </a>
                                </button>
                                <?php if ($_smarty_tpl->tpl_vars['mod']->value->getId() == $_smarty_tpl->tpl_vars['post']->value->getAutore()) {?>
                                <button class="border rounded-2 btn-outline-light my-3">
                                    <a class="nav-link" href="/chefskiss/Forum/modificaPost/<?php echo $_smarty_tpl->tpl_vars['post']->value->getId();?>
"> Modifica Post </a>
                                </button>
                                <?php }?>
                            <?php } else {
ob_start();
echo $_smarty_tpl->tpl_vars['mod']->value != null && $_smarty_tpl->tpl_vars['mod']->value->getId() == $_smarty_tpl->tpl_vars['post']->value->getAutore();
$_prefixVariable2 = ob_get_clean();
if ($_prefixVariable2) {?>
                                <button class="border rounded-2 btn-outline-light my-3">
                                    <a class="nav-link" href="/chefskiss/Utente/cancellaPost/<?php echo $_smarty_tpl->tpl_vars['post']->value->getId();?>
/<?php echo $_smarty_tpl->tpl_vars['post']->value->getId_immagine();?>
"> Cancella Post </a>
                                </button>
                                <button class="border rounded-2 btn-outline-light my-3">
                                    <a class="nav-link" href="/chefskiss/Forum/modificaPost/<?php echo $_smarty_tpl->tpl_vars['post']->value->getId();?>
"> Modifica Post </a>
                                </button>
                            <?php }}?>
                        </div>
                        <div class="col-lg-9">
                            <!-- Post content-->
                            <article>
                                <!-- Post header-->
                                <header class="mb-4">
                                    <!-- Post title-->
                                    <h1 class="fw-bolder mb-1"><?php echo $_smarty_tpl->tpl_vars['post']->value->getTitolo();?>
</h1>
                                    <!-- Post meta content-->
                                    <div class="text-muted fst-italic mb-2"><?php echo $_smarty_tpl->tpl_vars['post']->value->getData_pubb();?>
</div>
                                    <!-- Post categories-->
                                    <a class="badge bg-secondary text-decoration-none link-light" href="#!"><?php echo ucfirst($_smarty_tpl->tpl_vars['post']->value->getCategoria());?>
</a>
                                </header>
                                <!-- Preview image figure-->
                                <figure class="mb-4"><img class="img-fluid rounded" src="data:<?php echo $_smarty_tpl->tpl_vars['immagine']->value->getTipo();?>
;base64,<?php echo $_smarty_tpl->tpl_vars['immagine']->value->getImmagine();?>
" width=900 height=400 alt="..." /></figure>
                                <!-- Post content-->
                                <section class="mb-5">
                                <?php if (count($_smarty_tpl->tpl_vars['domanda']->value) != 1) {?>
                                    <?php
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);
$_smarty_tpl->tpl_vars['i']->value = 0;
if ($_smarty_tpl->tpl_vars['i']->value < count($_smarty_tpl->tpl_vars['domanda']->value)-1) {
for ($_foo=true;$_smarty_tpl->tpl_vars['i']->value < count($_smarty_tpl->tpl_vars['domanda']->value)-1; $_smarty_tpl->tpl_vars['i']->value++) {
?>
                                        <p class="fs-5 mb-4"><?php echo $_smarty_tpl->tpl_vars['domanda']->value[$_smarty_tpl->tpl_vars['i']->value];?>
.</p>
                                    <?php }
}
?>
                                <?php } else { ?>
                                    <p class="fs-5 mb-4"><?php echo $_smarty_tpl->tpl_vars['domanda']->value[0];?>
.</p>
                                <?php }?>
                                </section>
                            </article>
                            <!-- Comments section-->
                            <section>
                                <div class="card bg-light">
                                    <div class="card-body">
                                        <!-- Comment form-->
                                        <form class="mb-4" method="post" action="/chefskiss/Forum/InserisciCommento">
                                            <textarea class="form-control m-2" rows="3" placeholder="Join the discussion and leave a comment!" name="text_comment" required></textarea>
                                            <button class="rounded-1 border" type="submit">Invia</button>
                                        </form>
                                        <!-- Comment with nested comments-->
                                        <!--<div class="d-flex mb-4">-->
                                            <!-- Parent comment-->
                                            <!--<div class="flex-shrink-0"><img class="rounded-circle" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." /></div>
                                            <div class="ms-3">
                                                <div class="fw-bold">Commenter Name</div>
                                                If you're going to lead a space frontier, it has to be government; it'll never be private enterprise. Because the space frontier is dangerous, and it's expensive, and it has unquantified risks.-->
                                                <!-- Child comment 1-->
                                                <!--<div class="d-flex mt-4">
                                                    <div class="flex-shrink-0"><img class="rounded-circle" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." /></div>
                                                    <div class="ms-3">
                                                        <div class="fw-bold">Commenter Name</div>
                                                        And under those conditions, you cannot establish a capital-market evaluation of that enterprise. You can't get investors.
                                                    </div>
                                                </div>-->
                                                <!-- Child comment 2-->
                                                <!--<div class="d-flex mt-4">
                                                    <div class="flex-shrink-0"><img class="rounded-circle" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." /></div>
                                                    <div class="ms-3">
                                                        <div class="fw-bold">Commenter Name</div>
                                                        When you put money directly to a problem, it makes a good headline.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>-->
                                        <!-- Single comment-->
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
" width=40 height=40 alt="..." />
                                                                <?php ob_start();
echo $_smarty_tpl->tpl_vars['mod']->value != null && $_smarty_tpl->tpl_vars['mod']->value->getPrivilegi() >= 2;
$_prefixVariable3 = ob_get_clean();
if ($_prefixVariable3) {?>
                                                                    <button class="btn">
                                                                        <i class="fa fa-trash"></i>
                                                                        <a class="nav-link" href="/chefskiss/Moderatore/rimuoviCommento/<?php echo $_smarty_tpl->tpl_vars['array']->value[0][$_smarty_tpl->tpl_vars['i']->value]->getId();?>
/<?php echo $_smarty_tpl->tpl_vars['post']->value->getId();?>
">Rimuovi</a>
                                                                    </button>
                                                                <?php } else {
ob_start();
echo $_smarty_tpl->tpl_vars['mod']->value != null && $_smarty_tpl->tpl_vars['mod']->value->getId() == $_smarty_tpl->tpl_vars['array']->value[1][$_smarty_tpl->tpl_vars['i']->value]->getId();
$_prefixVariable4 = ob_get_clean();
if ($_prefixVariable4) {?>
                                                                    <button>
                                                                        <a class="nav-link" href="/chefskiss/Utente/cancellaCommento/<?php echo $_smarty_tpl->tpl_vars['array']->value[0][$_smarty_tpl->tpl_vars['i']->value]->getId();?>
"> Cancella </a>
                                                                    </button>
                                                                <?php } else { ?>
                                                                <?php }}?>
                                                            </div>
                                                            <div class="ms-3">
                                                                <div class="fw-bold"><?php echo $_smarty_tpl->tpl_vars['array']->value[1][$_smarty_tpl->tpl_vars['i']->value]->getNome();?>
 <?php echo $_smarty_tpl->tpl_vars['array']->value[1][$_smarty_tpl->tpl_vars['i']->value]->getCognome();?>
</div>
                                                                <?php echo $_smarty_tpl->tpl_vars['array']->value[0][$_smarty_tpl->tpl_vars['i']->value]->getTesto();?>
 <div class="text-start text-muted"><?php echo $_smarty_tpl->tpl_vars['array']->value[0][$_smarty_tpl->tpl_vars['i']->value]->getData();?>
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
" width=40 height=40 alt="..." />
                                                            <?php ob_start();
echo $_smarty_tpl->tpl_vars['mod']->value != null && $_smarty_tpl->tpl_vars['mod']->value->getPrivilegi() >= 2;
$_prefixVariable5 = ob_get_clean();
if ($_prefixVariable5) {?>
                                                                <button class="btn">
                                                                    <i class="fa fa-trash"></i>
                                                                    <a class="nav-link" href="/chefskiss/Moderatore/rimuoviCommento/<?php echo $_smarty_tpl->tpl_vars['array']->value[0]->getId();?>
/<?php echo $_smarty_tpl->tpl_vars['post']->value->getId();?>
">Rimuovi</a>
                                                                </button>
                                                            <?php } else {
ob_start();
echo $_smarty_tpl->tpl_vars['mod']->value != null && $_smarty_tpl->tpl_vars['mod']->value->getId() == $_smarty_tpl->tpl_vars['array']->value[1]->getId();
$_prefixVariable6 = ob_get_clean();
if ($_prefixVariable6) {?>
                                                                <button>
                                                                    <a class="nav-link" href="/chefskiss/Utente/cancellaCommento/<?php echo $_smarty_tpl->tpl_vars['array']->value[0]->getId();?>
"> Cancella </a>
                                                                </button>
                                                            <?php } else { ?>
                                                            <?php }}?>
                                                        </div>
                                                        <div class="ms-3">
                                                            <div class="fw-bold"><?php echo $_smarty_tpl->tpl_vars['array']->value[1]->getNome();?>
 <?php echo $_smarty_tpl->tpl_vars['array']->value[1]->getCognome();?>
</div>
                                                            <?php echo $_smarty_tpl->tpl_vars['array']->value[0]->getTesto();?>
 <div class="text-start text-muted"><?php echo $_smarty_tpl->tpl_vars['array']->value[0]->getData();?>
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
