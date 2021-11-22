<!DOCTYPE html>
{assign var='userlogged' value=$userlogged|default:'nouser'}
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
                            {if $userlogged!='nouser'}
                                <li class="nav-item text-light">
                                    <a class="nav-link" href="/chefskiss/Ricette/nuovaRicetta">Nuova Ricetta</a>
                                </li>
                                <li class="nav-item text-light">
                                    <a class="nav-link" href="/chefskiss/Forum/nuovaDomanda">Nuova Domanda</a>
                                </li>
                                <li class="nav-item text-light">
                                    {if $utente->getPrivilegi() == 3}
                                        <a class="nav-link" href="/chefskiss/Admin/homepage">Amministratore</a>

                                    {else}
                                    <a class="nav-link" href="/chefskiss/Utente/profilo">Profilo</a>
                                    {/if}
                                </li>
                                <li class="nav-item text-light">
                                    <a class="nav-link" href="/chefskiss/Utente/logout">Disconnetti</a>
                                </li>
                            {else}
                                <li class="nav-item">
                                    <a class="nav-link" href="/chefskiss/Utente/login">Accedi</a>
                                </li>
                            {/if}
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
                            <div class="pro-img"><img src="data:{$immagine_utente->getTipo()};base64,{$immagine_utente->getImmagine()}" width=40 height=40 alt="user"></div>
                            <div class="ms-3">
                                <h3 class="m-b-0">{$utente->getNome()} {$utente->getCognome()}</h3>
                                {if $utente->getPrivilegi() == 1}
                                    <p class="text-muted">Membro</p>
                                {/if}
                                {if $utente->getPrivilegi() == 2}
                                    <p class="text-muted">Moderatore</p>
                                {/if}
                                {if $utente->getPrivilegi() == 3}
                                    <p class="text-muted">Amministratore</p>
                                {/if}
                            </div>
                            {if $idutente == null}
                            <button class="border rounded-2 btn-outline-light">
                                <a class="nav-link" href="/chefskiss/Utente/modificaProfilo"> Modifica Profilo </a>
                            </button>   
                            {/if}
                            <div class="ms-3">
                                {if $ricette != null}
                                    {if is_array($ricette)}
                                        <h3 class="m-b-0 font-light">{sizeof($ricette)}</h3><small>Ricette Pubblicate</small>
                                    {else}
                                        <h3 class="m-b-0 font-light">1</h3><small>Ricetta Pubblicata</small>
                                    {/if}
                                {/if}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--Sezione Ricette Utente-->
            <section class="py-5">
                <div class="container px-5">
                    <h2 class="fw-bolder fs-5 mb-4">Le Ricette di {$utente->getNome()}</h2>
                    <div class="row gx-5">
                        {if $ricette}
                            {if is_array($ricette)}
                                {for $i = 0; $i < sizeof($ricette); $i++}
                                    <div class="col-lg-4 mb-5">
                                        <div class="card h-100 shadow border-0">
                                            <img class="card-img-top" src="data:{$immagini[$i]->getTipo()};base64,{$immagini[$i]->getImmagine()}" width=600 height=350 alt="..." />
                                            <div class="card-body p-4">
                                                <div class="badge bg-primary bg-gradient rounded-pill mb-2">{$ricette[$i]->getCategoria()}</div>
                                                <a class="text-decoration-none link-dark stretched-link" href="/chefskiss/Ricette/InfoRicetta/{$ricette[$i]->getId()}"><div class="h5 card-title mb-3">{$ricette[$i]->getNomeRicetta()}</div></a>
                                                <p class="card-text mb-0">{substr($ricette[$i]->getProcedimento(), 0, 100)}...</p>
                                            </div>
                                            <div class="card-footer p-4 pt-0 bg-transparent border-top-0">
                                                <div class="d-flex align-items-end justify-content-between">
                                                    <div class="d-flex align-items-center">
                                                        <img class="rounded-circle me-3" src="data:{$immagini_autori[$i]->getTipo()};base64,{$immagini_autori[$i]->getImmagine()}" width=40 height=40 alt="..." />
                                                        <div class="small">
                                                            <div class="fw-bold">{$utente->getNome()} {$utente->getCognome()}</div>
                                                            <div class="text-muted">{$ricette[$i]->getData_()} &middot; Per {$ricette[$i]->getDosiPersone()} persone &middot;
                                                            {for $j = 0; $j < (int) $ricette[$i]->getValutazione(); $j++}
                                                                <i class="bi bi-star"></i>
                                                            {/for}
                                                            {if $ricette[$i]->getValutazione() == 0}
                                                                ancora nessuna recensione
                                                            {/if}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                {/for}
                                {else}
                                    <div class="col-lg-4 mb-5">
                                        <div class="card h-100 shadow border-0">
                                            <img class="card-img-top" src="data:{$immagini->getTipo()};base64,{$immagini->getImmagine()}" width=600 height=350 alt="..." />
                                            <div class="card-body p-4">
                                                <div class="badge bg-primary bg-gradient rounded-pill mb-2">{$ricette->getCategoria()}</div>
                                                <a class="text-decoration-none link-dark stretched-link" href="/chefskiss/Ricette/InfoRicetta/{$ricette->getId()}"><div class="h5 card-title mb-3">{$ricette->getNomeRicetta()}</div></a>
                                                <p class="card-text mb-0">{substr($ricette->getProcedimento(), 0, 100)}...</p>
                                            </div>
                                            <div class="card-footer p-4 pt-0 bg-transparent border-top-0">
                                                <div class="d-flex align-items-end justify-content-between">
                                                    <div class="d-flex align-items-center">
                                                        <img class="rounded-circle me-3" src="data:{$immagini_autori->getTipo()};base64,{$immagini_autori->getImmagine()}" width=40 height=40 alt="..." />
                                                        <div class="small">
                                                            <div class="fw-bold">{$utente->getNome()} {$utente->getCognome()}</div>
                                                            <div class="text-muted">{$ricette->getData_()} &middot; Per {$ricette->getDosiPersone()} persone</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            {/if}
                            {else}
                            <h2> L'utente non ha ancora pubblicato ricette</h2>
                        {/if}
                    </div>
                </div>
        </section>
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
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
