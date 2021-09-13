<?php
/* Smarty version 3.1.39, created on 2021-09-13 10:36:43
  from '/Applications/XAMPP/xamppfiles/htdocs/ChefsKiss/chefskiss/smarty/libs/templates/index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_613f0d9b1e66d8_79016285',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '967ac9fbcb382e10ebb01281b4844860a1d45554' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/ChefsKiss/chefskiss/smarty/libs/templates/index.tpl',
      1 => 1631522160,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_613f0d9b1e66d8_79016285 (Smarty_Internal_Template $_smarty_tpl) {
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
        <link rel="icon" type="image/x-icon" href="/ChefsKiss/chefskiss/smarty/libs/assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="/ChefsKiss/chefskiss/smarty/libs/css/boot_styles.css" rel="stylesheet" type="text/css"/>

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
                    <a class="navbar-brand" href="index.tpl">Chef's Kiss</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
                            <!--<li class="nav-item"><a class="nav-link" href="about.html">About</a></li>-->
                            <li class="nav-item"><a class="nav-link" href="#">Contact</a></li>
                            <!--<li class="nav-item"><a class="nav-link" href="pricing.html">Pricing</a></li>-->
                            <li class="nav-item"><a class="nav-link" href="/ChefsKiss/chefskiss/Forum">Forum</a></li>
                            <li class="nav-item"><a class="nav-link" href="/ChefsKiss/chefskiss/Ricette/esplora">Ricette</a></li>
                            <?php if ($_smarty_tpl->tpl_vars['userlogged']->value != 'nouser') {?>
                                <li class="nav-item text-light">
                                    <a class="nav-link" href="/ChefsKiss/chefskiss/Utente/profilo">Profilo</a>
                                </li>
                                <li class="nav-item text-light">
                                    <a class="nav-link" href="/ChefsKiss/chefskiss/Utente/logout">Disconnetti</a>
                                </li>
                            <?php } else { ?>
                            <li class="nav-item">
                                <a class="nav-link" href="/ChefsKiss/chefskiss/Utente/login">Accedi</a>
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
            <!-- Header-->
            <header class="bg-dark py-5">
                <div class="container px-5">
                    <div class="row gx-5 align-items-center justify-content-center">
                        <div class="bd-example">
                            <div id="carouselExampleCaptions" class="carousel slide " data-ride="carousel">
                              <ol class="carousel-indicators">
                                <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                                <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                                <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                              </ol>
                              <div class="carousel-inner">
                                <div class="carousel-item active" data-interval="5000">
                                  <img src="<?php echo $_smarty_tpl->tpl_vars['Immagine1']->value;?>
" class="d-block w-100" alt="...">
                                  <div class="carousel-caption d-none d-md-block">
                                    <h2><?php echo $_smarty_tpl->tpl_vars['Nome_Ricetta1']->value;?>
</h2>
                                    <h3><?php echo $_smarty_tpl->tpl_vars['Descrizione_Ricetta1']->value;?>
</h3>
                                  </div>
                                </div>
                                <div class="carousel-item" data-interval="5000">
                                  <img src="<?php echo $_smarty_tpl->tpl_vars['Immagine2']->value;?>
" class="d-block w-100" alt="...">
                                  <div class="carousel-caption d-none d-md-block">
                                    <h2><?php echo $_smarty_tpl->tpl_vars['Nome_Ricetta2']->value;?>
</h2>
                                    <h3><?php echo $_smarty_tpl->tpl_vars['Descrizione_Ricetta2']->value;?>
</h3>
                                  </div>
                                </div>
                                <div class="carousel-item" data-interval="5000">
                                  <img src="<?php echo $_smarty_tpl->tpl_vars['Immagine3']->value;?>
" class="d-block w-100" alt="...">
                                  <div class="carousel-caption d-none d-md-block">
                                    <h2><?php echo $_smarty_tpl->tpl_vars['Nome_Ricetta3']->value;?>
</h2>
                                    <h3><?php echo $_smarty_tpl->tpl_vars['Descrizione_Ricetta3']->value;?>
</h3>
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
                        </div>
                    </div>
                </div>
            </header>
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
                                        <img src="<?php echo $_smarty_tpl->tpl_vars['Immagine4']->value;?>
" class="img-fluid rounded-start" alt="...">
                                      </div>
                                      <div class="col-md-8">
                                        <div class="card-body">
                                          <h5 class="card-title"><?php echo $_smarty_tpl->tpl_vars['Titolo_Ricetta1']->value;?>
</h5>
                                          <p class="card-text"><?php echo $_smarty_tpl->tpl_vars['Intro_Ricetta1']->value;?>
</p>
                                          <p class="card-text"><small class="text-muted"><?php echo $_smarty_tpl->tpl_vars['Data_Ricetta1']->value;?>
</small></p>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                <div class="card mb-3" style="max-width: 540px;">
                                    <div class="row g-0">
                                      <div class="col-md-4">
                                        <img src="<?php echo $_smarty_tpl->tpl_vars['Immagine5']->value;?>
" class="img-fluid rounded-start" alt="...">
                                      </div>
                                      <div class="col-md-8">
                                        <div class="card-body">
                                          <h5 class="card-title"><?php echo $_smarty_tpl->tpl_vars['Titolo_Ricetta2']->value;?>
</h5>
                                          <p class="card-text"><?php echo $_smarty_tpl->tpl_vars['Intro_Ricetta2']->value;?>
</p>
                                          <p class="card-text"><small class="text-muted"><?php echo $_smarty_tpl->tpl_vars['Data_Ricetta2']->value;?>
</small></p>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                <div class="card mb-3" style="max-width: 540px;">
                                    <div class="row g-0">
                                      <div class="col-md-4">
                                        <img src="<?php echo $_smarty_tpl->tpl_vars['Immagine6']->value;?>
" class="img-fluid rounded-start" alt="...">
                                      </div>
                                      <div class="col-md-8">
                                        <div class="card-body">
                                          <h5 class="card-title"><?php echo $_smarty_tpl->tpl_vars['Titolo_Ricetta3']->value;?>
</h5>
                                          <p class="card-text"><?php echo $_smarty_tpl->tpl_vars['Intro_Ricetta3']->value;?>
</p>
                                          <p class="card-text"><small class="text-muted"><?php echo $_smarty_tpl->tpl_vars['Data_Ricetta3']->value;?>
</small></p>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                <div class="card mb-3" style="max-width: 540px;">
                                    <div class="row g-0">
                                      <div class="col-md-4">
                                        <img src="<?php echo $_smarty_tpl->tpl_vars['Immagine7']->value;?>
" class="img-fluid rounded-start" alt="...">
                                      </div>
                                      <div class="col-md-8">
                                        <div class="card-body">
                                          <h5 class="card-title"><?php echo $_smarty_tpl->tpl_vars['Titolo_Ricetta4']->value;?>
</h5>
                                          <p class="card-text"><?php echo $_smarty_tpl->tpl_vars['Intro_Ricetta4']->value;?>
</p>
                                          <p class="card-text"><small class="text-muted"><?php echo $_smarty_tpl->tpl_vars['Data_Ricetta4']->value;?>
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
                                    <img class="rounded-circle me-3" src="https://dummyimage.com/40x40/ced4da/6c757d" alt="..." />
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
                        <div class="col-lg-4 mb-5">
                            <div class="card h-100 shadow border-0">
                                <img class="card-img-top" src="<?php echo $_smarty_tpl->tpl_vars['Immagine_Forum1']->value;?>
" alt="..." />
                                <div class="card-body p-4">
                                    <div class="badge bg-primary bg-gradient rounded-pill mb-2">Post</div>
                                    <a class="text-decoration-none link-dark stretched-link" href="#!"><h5 class="card-title mb-3"><?php echo $_smarty_tpl->tpl_vars['Titolo_Post1']->value;?>
</h5></a>
                                    <p class="card-text mb-0"><?php echo $_smarty_tpl->tpl_vars['Descrizione_Post1']->value;?>
</p>
                                </div>
                                <div class="card-footer p-4 pt-0 bg-transparent border-top-0">
                                    <div class="d-flex align-items-end justify-content-between">
                                        <div class="d-flex align-items-center">
                                            <img class="rounded-circle me-3" src="<?php echo $_smarty_tpl->tpl_vars['Immagine_Autore1']->value;?>
" alt="..." />
                                            <div class="small">
                                                <div class="fw-bold"><?php echo $_smarty_tpl->tpl_vars['Nome_Autore1']->value;?>
</div>
                                                <div class="text-muted"><?php echo $_smarty_tpl->tpl_vars['Data_Post1']->value;?>
</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 mb-5">
                            <div class="card h-100 shadow border-0">
                                <img class="card-img-top" src="<?php echo $_smarty_tpl->tpl_vars['Immagine_Forum2']->value;?>
" alt="..." />
                                <div class="card-body p-4">
                                    <div class="badge bg-primary bg-gradient rounded-pill mb-2">Post</div>
                                    <a class="text-decoration-none link-dark stretched-link" href="#!"><h5 class="card-title mb-3"><?php echo $_smarty_tpl->tpl_vars['Titolo_Post2']->value;?>
</h5></a>
                                    <p class="card-text mb-0"><?php echo $_smarty_tpl->tpl_vars['Descrizione_Post2']->value;?>
</p>
                                </div>
                                <div class="card-footer p-4 pt-0 bg-transparent border-top-0">
                                    <div class="d-flex align-items-end justify-content-between">
                                        <div class="d-flex align-items-center">
                                            <img class="rounded-circle me-3" src="<?php echo $_smarty_tpl->tpl_vars['Immagine_Autore2']->value;?>
" alt="..." />
                                            <div class="small">
                                                <div class="fw-bold"><?php echo $_smarty_tpl->tpl_vars['Nome_Autore2']->value;?>
</div>
                                                <div class="text-muted"><?php echo $_smarty_tpl->tpl_vars['Data_Post2']->value;?>
</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 mb-5">
                            <div class="card h-100 shadow border-0">
                                <img class="card-img-top" src="<?php echo $_smarty_tpl->tpl_vars['Immagine_Forum3']->value;?>
" alt="..." />
                                <div class="card-body p-4">
                                    <div class="badge bg-primary bg-gradient rounded-pill mb-2">Post</div>
                                    <a class="text-decoration-none link-dark stretched-link" href="#!"><h5 class="card-title mb-3"><?php echo $_smarty_tpl->tpl_vars['Titolo_Post3']->value;?>
</h5></a>
                                    <p class="card-text mb-0"><?php echo $_smarty_tpl->tpl_vars['Descrizione_Post3']->value;?>
</p>
                                </div>
                                <div class="card-footer p-4 pt-0 bg-transparent border-top-0">
                                    <div class="d-flex align-items-end justify-content-between">
                                        <div class="d-flex align-items-center">
                                            <img class="rounded-circle me-3" src="<?php echo $_smarty_tpl->tpl_vars['Immagine_Autore3']->value;?>
" alt="..." />
                                            <div class="small">
                                                <div class="fw-bold"><?php echo $_smarty_tpl->tpl_vars['Nome_Autore3']->value;?>
</div>
                                                <div class="text-muted"><?php echo $_smarty_tpl->tpl_vars['Data_Post3']->value;?>
</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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
