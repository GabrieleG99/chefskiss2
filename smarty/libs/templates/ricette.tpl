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
                            {if $userlogged!='nouser'}
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
                            {else}
                                <li class="nav-item">
                                    <a class="nav-link" href="/chefskiss/Utente/login">Accedi</a>
                                </li>
                            {/if}
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- Page Content-->
            {if $ricette}
                {if is_array($ricette)}
                    <section class="py-5">
                        <div class="container px-5">
                            <h1 class="fw-bolder fs-5 mb-4">Le ricette</h1>
                            <div class="card border-0 shadow rounded-3 overflow-hidden">
                                <div class="card-body p-0">
                                    <div class="row gx-0">
                                        <div class="col-lg-6 col-xl-5 py-lg-5">
                                            <div class="p-4 p-md-5">
                                                <div class="badge bg-primary bg-gradient rounded-pill mb-2">Ricetta del giorno</div>
                                                <div class="h2 fw-bolder">{$ricette[$ran_num]->getNomeRicetta()}</div>
                                                <p>{substr($ricette[$ran_num]->getProcedimento(), 0, 100)}...</p>
                                                <a class="stretched-link text-decoration-none" href="/chefskiss/Ricette/InfoRicetta/{$ricette[$ran_num]->getId()}">
                                                    Leggi tutta la ricetta
                                                    <i class="bi bi-arrow-right"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-xl-7"><div class="bg-featured-blog"> <img src="data:{$array[2][$ran_num]->getTipo()};base64,{$array[2][$ran_num]->getImmagine()}" width=600 height=450></div></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    {else}
                    <section class="py-5">
                        <div class="container px-5">
                            <h1 class="fw-bolder fs-5 mb-4">Le ricette</h1>
                            <div class="card border-0 shadow rounded-3 overflow-hidden">
                                <div class="card-body p-0">
                                    <div class="row gx-0">
                                        <div class="col-lg-6 col-xl-5 py-lg-5">
                                            <div class="p-4 p-md-5">
                                                <div class="badge bg-primary bg-gradient rounded-pill mb-2">Ricetta del giorno</div>
                                                <div class="h2 fw-bolder">{$ricette->getNomeRicetta()}</div>
                                                <p>{substr($ricette->getProcedimento(), 0, 100)}...</p>
                                                <a class="stretched-link text-decoration-none" href="/chefskiss/Ricette/InfoRicetta/{$ricette->getId()}">
                                                    Leggi tutta la ricetta
                                                    <i class="bi bi-arrow-right"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-xl-7"><div class="bg-featured-blog"> <img src="data:{$array[2]->getTipo()};base64,{$array[2]->getImmagine()}" width=600 height=450></div></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                {/if}
                {else}
                    <section class="py-5">
                        <div class="container px-5">
                            <h1 class="fw-bolder fs-5 mb-4">Ancora nessuna ricetta da vedere!</h1>
                        </div>
                    </section>
            {/if}
            <!-- Blog preview section-->
            <section class="py-5">
                <div class="container px-5">
                    {if $array}
                        {if is_array($array[0])}
                            <h2 class="fw-bolder fs-5 mb-4">Esplora le ricette</h2>
                            <div class="row gx-5">
                                {for $i = 0; $i < 3; $i++}
                                    <div class="col-lg-4 mb-5">
                                        <div class="card h-100 shadow border-0">
                                            <img class="card-img-top" src="data:{$array[2][$i]->getTipo()};base64,{$array[2][$i]->getImmagine()}" width=600 height=350 alt="..." />
                                            <div class="card-body p-4">
                                                <div class="badge bg-primary bg-gradient rounded-pill mb-2">{$array[0][$i]->getCategoria()}</div>
                                                <a class="text-decoration-none link-dark stretched-link" href="InfoRicetta/{$array[0][$i]->getId()}"><div class="h5 card-title mb-3">{$array[0][$i]->getNomeRicetta()}</div></a>
                                                <p class="card-text mb-0">{substr($array[0][$i]->getProcedimento(), 0, 100)}...</p>
                                            </div>
                                            <div class="card-footer p-4 pt-0 bg-transparent border-top-0">
                                                <div class="d-flex align-items-end justify-content-between">
                                                    <div class="d-flex align-items-center">
                                                        <img class="rounded-circle me-3" src="data:{$array[3][$i]->getTipo()};base64,{$array[3][$i]->getImmagine()}" width=40 height=40 alt="..." />
                                                        <div class="small">
                                                            <div class="fw-bold">{$array[1][$i]->getNome()} {$array[1][$i]->getCognome()}</div>
                                                            <div class="text-muted">{$array[0][$i]->getData_()} &middot; Per {$array[0][$i]->getDosiPersone()} persone &middot; 
                                                            {for $x = 0; $x < (int)$array[0][$i]->getValutazione(); $x++}
                                                                <i class="bi bi-star"></i>
                                                            {/for}
                                                            {if $array[0][$i]->getValutazione() == 0}
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
                            {/if}
                        {/if}

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
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
            <!-- Core theme JS-->
            <script src="js/scripts.js"></script>
    </body>
</html>
