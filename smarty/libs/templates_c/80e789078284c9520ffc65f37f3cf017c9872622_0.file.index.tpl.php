<?php
/* Smarty version 3.1.39, created on 2021-11-22 17:08:18
  from 'C:\xampp\htdocs\chefskiss\smarty\libs\templates\index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_619bc0725dfbc5_46561223',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '80e789078284c9520ffc65f37f3cf017c9872622' => 
    array (
      0 => 'C:\\xampp\\htdocs\\chefskiss\\smarty\\libs\\templates\\index.tpl',
      1 => 1637597295,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_619bc0725dfbc5_46561223 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<?php $_smarty_tpl->_assignInScope('userlogged', (($tmp = @$_smarty_tpl->tpl_vars['userlogged']->value)===null||$tmp==='' ? 'nouser' : $tmp));?>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Chef's Kiss - Ricette e Forum</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="/chefskiss/smarty/libs/assets/chef-hat.png" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="/chefskiss/smarty/libs/css/boot_styles.css" rel="stylesheet" type="text/css"/>

    <?php echo '<script'; ?>
>
        function ready(){
            if (!navigator.cookieEnabled) {
                alert('Attenzione! Attivare i cookie per proseguire correttamente la navigazione');
            }
        }
        document.addEventListener("DOMContentLoaded", ready);
    <?php echo '</script'; ?>
>

    </head>
    <body class="d-flex flex-column h-100">
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
            <div id="carouselExampleCaptions" class="container px-5 carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                    <a href="/chefskiss/Ricette/InfoRicetta/<?php echo $_smarty_tpl->tpl_vars['ricette_home']->value[0]->getId();?>
"><img src="data:<?php echo $_smarty_tpl->tpl_vars['immagini']->value[0]->getTipo();?>
;base64,<?php echo $_smarty_tpl->tpl_vars['immagini']->value[0]->getImmagine();?>
" width=900 height=500 class="d-block w-100" alt="..."></a>
                    <div class="carousel-caption d-none d-md-block">
                        <h5><?php echo $_smarty_tpl->tpl_vars['ricette_home']->value[0]->getNomeRicetta();?>
</h5>
                    </div>
                    </div>
                    <div class="carousel-item">
                    <a href="/chefskiss/Ricette/InfoRicetta/<?php echo $_smarty_tpl->tpl_vars['ricette_home']->value[1]->getId();?>
"><img src="data:<?php echo $_smarty_tpl->tpl_vars['immagini']->value[1]->getTipo();?>
;base64,<?php echo $_smarty_tpl->tpl_vars['immagini']->value[1]->getImmagine();?>
" width=900 height=500 class="d-block w-100" alt="..."></a>
                    <div class="carousel-caption d-none d-md-block">
                        <h5><?php echo $_smarty_tpl->tpl_vars['ricette_home']->value[1]->getNomeRicetta();?>
</h5>
                    </div>
                    </div>
                    <div class="carousel-item">
                    <a href="/chefskiss/Ricette/InfoRicetta/<?php echo $_smarty_tpl->tpl_vars['ricette_home']->value[2]->getId();?>
"><img src="data:<?php echo $_smarty_tpl->tpl_vars['immagini']->value[2]->getTipo();?>
;base64,<?php echo $_smarty_tpl->tpl_vars['immagini']->value[2]->getImmagine();?>
" width=900 height=500 class="d-block w-100" alt="..."></a>
                    <div class="carousel-caption d-none d-md-block">
                        <h5><?php echo $_smarty_tpl->tpl_vars['ricette_home']->value[2]->getNomeRicetta();?>
</h5>
                    </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
            <!-- Features section-->
            <section class="py-5" id="features">
                <div class="container px-5 my-5">
                    <div class="row gx-5">
                        <div class="col-lg-4 mb-5 mb-lg-0"><h2 class="fw-bolder mb-0">Le ricette più votate</h2></div>
                        <div class="col-lg-8">
                            <div class="row gx-5 row-cols-1 row-cols-md-2">
                                <div class="card mb-3" style="max-width: 540px;">
                                    <div class="row g-0">
                                      <div class="col-md-4">
                                        <a href="/chefskiss/Ricette/InfoRicetta/<?php echo $_smarty_tpl->tpl_vars['ricette_home']->value[3]->getId();?>
"><img src="data:<?php echo $_smarty_tpl->tpl_vars['immagini']->value[3]->getTipo();?>
;base64,<?php echo $_smarty_tpl->tpl_vars['immagini']->value[3]->getImmagine();?>
" width="400" height="200" class="img-fluid rounded-start" alt="..."></a>
                                      </div>
                                      <div class="col-md-8">
                                        <div class="card-body">
                                          <h5 class="card-title"><?php echo $_smarty_tpl->tpl_vars['ricette_home']->value[3]->getNomeRicetta();?>
</h5>
                                          <p class="card-text"><?php echo substr($_smarty_tpl->tpl_vars['ricette_home']->value[3]->getProcedimento(),0,100);?>
...</p>
                                          <p class="card-text"><small class="text-muted"><?php echo $_smarty_tpl->tpl_vars['ricette_home']->value[3]->getData_();?>
 &middot; 
                                            <?php
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);
$_smarty_tpl->tpl_vars['i']->value = 0;
if ($_smarty_tpl->tpl_vars['i']->value < (int)$_smarty_tpl->tpl_vars['ricette_home']->value[3]->getValutazione()) {
for ($_foo=true;$_smarty_tpl->tpl_vars['i']->value < (int)$_smarty_tpl->tpl_vars['ricette_home']->value[3]->getValutazione(); $_smarty_tpl->tpl_vars['i']->value++) {
?>
                                                <i class="bi bi-star"></i>
                                            <?php }
}
?>
                                            </small></p>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                <div class="card mb-3" style="max-width: 540px;">
                                    <div class="row g-0">
                                      <div class="col-md-4">
                                        <a href="/chefskiss/Ricette/InfoRicetta/<?php echo $_smarty_tpl->tpl_vars['ricette_home']->value[4]->getId();?>
"><img src="data:<?php echo $_smarty_tpl->tpl_vars['immagini']->value[4]->getTipo();?>
;base64,<?php echo $_smarty_tpl->tpl_vars['immagini']->value[4]->getImmagine();?>
" width="400" height="200" class="img-fluid rounded-start" alt="..."></a>
                                      </div>
                                      <div class="col-md-8">
                                        <div class="card-body">
                                          <h5 class="card-title"><?php echo $_smarty_tpl->tpl_vars['ricette_home']->value[4]->getNomeRicetta();?>
</h5>
                                          <p class="card-text"><?php echo substr($_smarty_tpl->tpl_vars['ricette_home']->value[4]->getProcedimento(),0,100);?>
...</p>
                                          <p class="card-text"><small class="text-muted"><?php echo $_smarty_tpl->tpl_vars['ricette_home']->value[4]->getData_();?>
 &middot; 
                                            <?php
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);
$_smarty_tpl->tpl_vars['i']->value = 0;
if ($_smarty_tpl->tpl_vars['i']->value < (int)$_smarty_tpl->tpl_vars['ricette_home']->value[4]->getValutazione()) {
for ($_foo=true;$_smarty_tpl->tpl_vars['i']->value < (int)$_smarty_tpl->tpl_vars['ricette_home']->value[4]->getValutazione(); $_smarty_tpl->tpl_vars['i']->value++) {
?>
                                                <i class="bi bi-star"></i>
                                            <?php }
}
?>
                                            </small></p>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                <div class="card mb-3" style="max-width: 540px;">
                                    <div class="row g-0">
                                      <div class="col-md-4">
                                        <a href="/chefskiss/Ricette/InfoRicetta/<?php echo $_smarty_tpl->tpl_vars['ricette_home']->value[5]->getId();?>
"><img src="data:<?php echo $_smarty_tpl->tpl_vars['immagini']->value[5]->getTipo();?>
;base64,<?php echo $_smarty_tpl->tpl_vars['immagini']->value[5]->getImmagine();?>
" width="400" height="200" class="img-fluid rounded-start" alt="..."></a>
                                      </div>
                                      <div class="col-md-8">
                                        <div class="card-body">
                                          <h5 class="card-title"><?php echo $_smarty_tpl->tpl_vars['ricette_home']->value[5]->getNomeRicetta();?>
</h5>
                                          <p class="card-text"><?php echo substr($_smarty_tpl->tpl_vars['ricette_home']->value[5]->getProcedimento(),0,100);?>
...</p>
                                          <p class="card-text"><small class="text-muted"><?php echo $_smarty_tpl->tpl_vars['ricette_home']->value[5]->getData_();?>
 &middot; 
                                            <?php
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);
$_smarty_tpl->tpl_vars['i']->value = 0;
if ($_smarty_tpl->tpl_vars['i']->value < (int)$_smarty_tpl->tpl_vars['ricette_home']->value[5]->getValutazione()) {
for ($_foo=true;$_smarty_tpl->tpl_vars['i']->value < (int)$_smarty_tpl->tpl_vars['ricette_home']->value[5]->getValutazione(); $_smarty_tpl->tpl_vars['i']->value++) {
?>
                                                <i class="bi bi-star"></i>
                                            <?php }
}
?>
                                            </small></p>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                <div class="card mb-3" style="max-width: 540px;">
                                    <div class="row g-0">
                                      <div class="col-md-4">
                                        <a href="/chefskiss/Ricette/InfoRicetta/<?php echo $_smarty_tpl->tpl_vars['ricette_home']->value[6]->getId();?>
"><img src="data:<?php echo $_smarty_tpl->tpl_vars['immagini']->value[6]->getTipo();?>
;base64,<?php echo $_smarty_tpl->tpl_vars['immagini']->value[6]->getImmagine();?>
" width="400" height="200" class="img-fluid rounded-start" alt="..."></a>
                                      </div>
                                      <div class="col-md-8">
                                        <div class="card-body">
                                          <h5 class="card-title"><?php echo $_smarty_tpl->tpl_vars['ricette_home']->value[6]->getNomeRicetta();?>
</h5>
                                          <p class="card-text"><?php echo substr($_smarty_tpl->tpl_vars['ricette_home']->value[6]->getProcedimento(),0,100);?>
...</p>
                                          <p class="card-text"><small class="text-muted"><?php echo $_smarty_tpl->tpl_vars['ricette_home']->value[6]->getData_();?>
 &middot; 
                                            <?php
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);
$_smarty_tpl->tpl_vars['i']->value = 0;
if ($_smarty_tpl->tpl_vars['i']->value < (int)$_smarty_tpl->tpl_vars['ricette_home']->value[6]->getValutazione()) {
for ($_foo=true;$_smarty_tpl->tpl_vars['i']->value < (int)$_smarty_tpl->tpl_vars['ricette_home']->value[6]->getValutazione(); $_smarty_tpl->tpl_vars['i']->value++) {
?>
                                                <i class="bi bi-star"></i>
                                            <?php }
}
?>
                                            </small></p>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Testimonial section-->
            <div class="py-5 bg-light">
                <div class="container px-5 my-5">
                    <div class="row gx-5 justify-content-center">
                        <div class="col-lg-10 col-xl-7">
                            <div class="text-center">
                                <div class="fs-4 mb-4 fst-italic">"A RECIPE HAS NO SOUL. YOU, AS THE COOK, MUST BRING SOUL TO THE RECIPE"</div>
                                <div class="d-flex align-items-center justify-content-center">
                                    <img class="rounded-circle me-3" src="./smarty/libs/assets/ThomasKeller828x1344.jpg" width=40 height=40 alt="..." />
                                    <div class="fw-bold">
                                        Thomas Keller
                                        <span class="fw-bold text-primary mx-1">/</span>
                                        Chef
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Blog preview section-->
            <section class="py-5">
                <div class="container px-5 my-5">
                    <div class="row gx-5 justify-content-center">
                        <div class="col-lg-8 col-xl-6">
                            <div class="text-center">
                                <h2 class="fw-bolder">Le domande di tendenza</h2>
                                <p class="lead fw-normal text-muted mb-5">In questa sezione potrai trovare le domande più richieste.</p>
                            </div>
                        </div>
                    </div>
                    <div class="row gx-5">
                        <?php if (is_array($_smarty_tpl->tpl_vars['post_home']->value) && is_array($_smarty_tpl->tpl_vars['post_author']->value) && is_array($_smarty_tpl->tpl_vars['post_immagine']->value)) {?>
                            <?php
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);
$_smarty_tpl->tpl_vars['i']->value = 0;
if ($_smarty_tpl->tpl_vars['i']->value < sizeof($_smarty_tpl->tpl_vars['post_home']->value)) {
for ($_foo=true;$_smarty_tpl->tpl_vars['i']->value < sizeof($_smarty_tpl->tpl_vars['post_home']->value); $_smarty_tpl->tpl_vars['i']->value++) {
?>
                                <div class="col-lg-4 mb-5">
                                    <div class="card h-100 shadow border-0">
                                        <img class="card-img-top" src="data:<?php echo $_smarty_tpl->tpl_vars['post_immagine']->value[$_smarty_tpl->tpl_vars['i']->value]->getTipo();?>
;base64,<?php echo $_smarty_tpl->tpl_vars['post_immagine']->value[$_smarty_tpl->tpl_vars['i']->value]->getImmagine();?>
" width=600 height=350 alt="..." />
                                        <div class="card-body p-4">
                                            <div class="badge bg-primary bg-gradient rounded-pill mb-2">Post</div>
                                            <a class="text-decoration-none link-dark stretched-link" href="/chefskiss/Forum/InfoPost/<?php echo $_smarty_tpl->tpl_vars['post_home']->value[$_smarty_tpl->tpl_vars['i']->value]->getId();?>
"><h5 class="card-title mb-3"><?php echo $_smarty_tpl->tpl_vars['post_home']->value[$_smarty_tpl->tpl_vars['i']->value]->getTitolo();?>
</h5></a>
                                            <p class="card-text mb-0"><?php echo substr($_smarty_tpl->tpl_vars['post_home']->value[$_smarty_tpl->tpl_vars['i']->value]->getDomanda(),0,100);?>
...</p>
                                        </div>
                                        <div class="card-footer p-4 pt-0 bg-transparent border-top-0">
                                            <div class="d-flex align-items-end justify-content-between">
                                                <div class="d-flex align-items-center">
                                                    <img class="rounded-circle me-3" src="data:<?php echo $_smarty_tpl->tpl_vars['immagini_autore']->value[$_smarty_tpl->tpl_vars['i']->value]->getTipo();?>
;base64,<?php echo $_smarty_tpl->tpl_vars['immagini_autore']->value[$_smarty_tpl->tpl_vars['i']->value]->getImmagine();?>
" width="40" height="40" alt="..." />
                                                    <div class="small">
                                                        <div class="fw-bold"><?php echo $_smarty_tpl->tpl_vars['post_author']->value[$_smarty_tpl->tpl_vars['i']->value]->getNome();?>
 <?php echo $_smarty_tpl->tpl_vars['post_author']->value[$_smarty_tpl->tpl_vars['i']->value]->getCognome();?>
</div>
                                                        <div class="text-muted"><?php echo $_smarty_tpl->tpl_vars['post_home']->value[$_smarty_tpl->tpl_vars['i']->value]->getData_pubb();?>
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
                    </div>
                    <!-- Call to action-->
                    <!--<aside class="bg-primary bg-gradient rounded-3 p-4 p-sm-5 mt-5">
                        <div class="d-flex align-items-center justify-content-between flex-column flex-xl-row text-center text-xl-start">
                            <div class="mb-4 mb-xl-0">
                                <div class="fs-3 fw-bold text-white">New products, delivered to you.</div>
                                <div class="text-white-50">Sign up for our newsletter for the latest updates.</div>
                            </div>
                            <div class="ms-xl-4">
                                <div class="input-group mb-2">
                                    <input class="form-control" type="text" placeholder="Email address..." aria-label="Email address..." aria-describedby="button-newsletter" />
                                    <button class="btn btn-outline-light" id="button-newsletter" type="button">Sign up</button>
                                </div>
                                <div class="small text-white-50">We care about privacy, and will never share your data.</div>
                            </div>
                        </div>
                    </aside>-->
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
                        <a class="link-light small" href="Contact/contattaci">Contact</a>
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
