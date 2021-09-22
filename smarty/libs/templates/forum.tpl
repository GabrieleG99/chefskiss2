<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Chef's Kiss - Forum e Ricette</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="/chefskiss/smarty/libs/assets/favicon.ico" />
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
                        <!--<li class="nav-item"><a class="nav-link" href="about.html">About</a></li>-->
                        <li class="nav-item"><a class="nav-link" href="#">Contact</a></li>
                        <!--<li class="nav-item"><a class="nav-link" href="pricing.html">Pricing</a></li>-->
                        <li class="nav-item"><a class="nav-link" href="/chefskiss/Forum/esploraLeDomande">Forum</a></li>
                        <li class="nav-item"><a class="nav-link" href="/chefskiss/Ricette/esplora">Ricette</a></li>
                        {if $userlogged!='nouser'}
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
        <!-- Page header with logo and tagline-->
        <header class="py-5 bg-light border-bottom mb-4">
            <div class="container">
                <div class="text-center my-5">
                    <h1 class="fw-bolder">Benvenuto nel Forum!</h1>
                    <p class="lead mb-0">Naviga tra le domande poste dai nostri utenti</p>
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
                        <a href="#!"><img class="card-img-top" src="data:{$immagini[0]->getTipo()};base64, {$immagini[0]->getImmagine()}" width=900 height=400 alt="..." /></a>
                        <div class="card-body">
                            <div class="small text-muted">{$post[0]->getData_pubb()}</div>
                            <h2 class="card-title">{$post[0]->getTitolo()}</h2>
                            <p class="card-text">{substr($post[0]->getDomanda(), 0, 100)}...</p>
                        </div>
                    </div>
                    <!-- Nested row for non-featured blog posts-->
                    <div class="row">
                        <div class="col-lg-6">
                            <!-- Blog post-->
                            {if count($post) >= 2}
                                <div class="card mb-4">
                                    <a href="#!"><img class="card-img-top" src="data:{$immagini[1]->getTipo()};base64, {$immagini[1]->getImmagine()}" alt="..." /></a>
                                    <div class="card-body">
                                        <div class="small text-muted">{$post[1]->getData_pubb()}</div>
                                        <h2 class="card-title h4">{$post[1]->getTitolo()}</h2>
                                        <p class="card-text">{substr($post[1]->getDomanda(), 0, 100)}...</p>
                                    </div>
                                </div>
                            {/if}
                            <!-- Blog post-->
                            {if count($post) >= 3}
                                <div class="card mb-4">
                                    <a href="#!"><img class="card-img-top" src="data:{$immagini[2]->getTipo()};base64, {$immagini[2]->getImmagine()}" alt="..." /></a>
                                    <div class="card-body">
                                        <div class="small text-muted">{$post[2]->getData_pubb()}</div>
                                        <h2 class="card-title h4">{$post[2]->getTitolo()}</h2>
                                        <p class="card-text">{substr($post[2]->getDomanda(), 0, 100)}...</p>
                                    </div>
                                </div>
                            {/if}
                        </div>
                        <div class="col-lg-6">
                            <!-- Blog post-->
                            {if count($post) >= 4}
                            <div class="card mb-4">
                                <a href="#!"><img class="card-img-top" src="data:{$immagini[3]->getTipo()};base64, {$immagini[3]->getImmagine()}" alt="..." /></a>
                                <div class="card-body">
                                    <div class="small text-muted">{$post[3]->getData_pubb()}</div>
                                    <h2 class="card-title h4">{$post[3]->getTitolo()}</h2>
                                    <p class="card-text">{substr($post[3]->getDomanda(), 0, 100)}...</p>
                                </div>
                            </div>
                            {/if}
                            <!-- Blog post-->
                            {if count($post) == 5}
                            <div class="card mb-4">
                                <a href="#!"><img class="card-img-top" src="data:{$immagini[4]->getTipo()};base64, {$immagini[4]->getImmagine()}" alt="..." /></a>
                                <div class="card-body">
                                    <div class="small text-muted">{$post[4]->getData_pubb()}</div>
                                    <h2 class="card-title h4">{$post[4]->getTitolo()}</h2>
                                    <p class="card-text">{substr($post[4]->getDomanda(), 0, 100)}...</p>
                                </div>
                            </div>
                            {/if}
                        </div>
                    </div>
                    <!-- Pagination-->
                    <nav aria-label="Pagination">
                        <hr class="my-0" />
                        <ul class="pagination justify-content-center my-4">
                            {if $index == 1}
                                <li class="page-item disabled"><a class="page-link" href="#" tabindex="-1" aria-disabled="true">Back</a></li>
                                <li class="page-item active" aria-current="page"><a class="page-link" href="/chefskiss/Forum/esploraLeDomande/{$index}">{$index}</a></li>
                                <li class="page-item"><a class="page-link" href="/chefskiss/Forum/esploraLeDomande/{$index + 1}">{$index + 1}</a></li>
                                {if $index + 2 < $num_pagine}
                                    <li class="page-item"><a class="page-link" href="/chefskiss/Forum/esploraLeDomande/{$index + 2}">{$index + 2}</a></li>
                                {/if}
                            {else}
                                <li class="page-item"><a class="page-link" href="/chefskiss/Forum/esploraLeDomande/{$index - 1}" tabindex="-1" aria-disabled="true">Back</a></li>
                                <li class="page-item" aria-current="page"><a class="page-link" href="/chefskiss/Forum/esploraLeDomande/{$index - 1}">{$index - 1}</a></li>
                                <li class="page-item active"><a class="page-link" href="/chefskiss/Forum/esploraLeDomande/{$index}">{$index}</a></li>
                                {if $index + 1 < $num_pagine}
                                    <li class="page-item"><a class="page-link" href="/chefskiss/Forum/esploraLeDomande/{$index + 1}">{$index + 1}</a></li>
                                {/if}
                            {/if}
                            {if $num_pagine <= $index + 1 && $num_pagine != $index}
                                <li class="page-item"><a class="page-link" href="/chefskiss/Forum/esploraLeDomande/{$num_pagine}">{$num_pagine}</a></li>
                            {elseif $index < $num_pagine - 1}
                                <li class="page-item disabled"><a class="page-link" href="#!">...</a></li>
                                <li class="page-item"><a class="page-link" href="/chefskiss/Forum/esploraLeDomande/{$num_pagine}">{$num_pagine}</a></li>
                            {/if}
                            <li class="page-item"><a class="page-link" href="/chefskiss/Ricette/EsploraLeRicette/{$index + 1}">Next</a></li>
                        </ul>
                    </nav>
                </div>
                <!-- Side widgets-->
                <div class="col-lg-4">
                    <!-- Search widget-->
                    <div class="card mb-4">
                        <div class="card-header">Search</div>
                        <div class="card-body">
                            <div class="input-group">
                                <input class="form-control" type="text" placeholder="Enter search term..." aria-label="Enter search term..." aria-describedby="button-search" />
                                <button class="btn btn-primary" id="button-search" type="button">Go!</button>
                            </div>
                        </div>
                    </div>
                    <!-- Categories widget-->
                    <div class="card mb-4">
                        <div class="card-header">Categories</div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <ul class="list-unstyled mb-0">
                                        <li><a href="#!">Web Design</a></li>
                                        <li><a href="#!">HTML</a></li>
                                        <li><a href="#!">Freebies</a></li>
                                    </ul>
                                </div>
                                <div class="col-sm-6">
                                    <ul class="list-unstyled mb-0">
                                        <li><a href="#!">JavaScript</a></li>
                                        <li><a href="#!">CSS</a></li>
                                        <li><a href="#!">Tutorials</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Side widget-->
                    <div class="card mb-4">
                        <div class="card-header">Side Widget</div>
                        <div class="card-body">You can put anything you want inside of these side widgets. They are easy to use, and feature the Bootstrap 5 card component!</div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2021</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
