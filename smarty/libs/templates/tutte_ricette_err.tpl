<!DOCTYPE html>
{assign var='userlogged' value=$userlogged|default:'nouser'}
{assign var='searchMod' value=$searchMod|default:'searchOff'}
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Chef's Kiss - Forum e Ricette</title>
        <!-- Favicon-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="/chefskiss/smarty/libs/assets/chef-hat.png" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="/chefskiss/smarty/libs/css/boot_styles.css" rel="stylesheet" />
    </head>
    <body>
        <!-- Responsive navbar-->
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
        <!-- Page header with logo and tagline-->
        <header class="py-5 bg-light border-bottom mb-4">
            <div class="container">
                <div class="text-center my-5">
                    <h1 class="fw-bolder">Benvenuto nelle Ricette!</h1>
                    <p class="lead mb-0">Esplora le ricette che ti appassionano di più!</p>
                    {if $tipoerr == 'no_categoria'}
                        <p>Non è presente alcuna ricetta della categoria: {$input}</p>
                    {/if}
                    {if $tipoerr == 'no_ricerca'}
                        <p>Non è presente alcuna ricetta come: {$input}</p>
                    {/if}
                </div>
            </div>
        </header>
        <!-- Page content-->
        <div class="container">
        {if !is_array($immagini) && !is_array($ricette)}
            <div class="row">
                <!-- Blog entries-->
                <div class="col-lg-8">
                    <!-- Featured blog post-->
                    <div class="card mb-4">
                        <a href="/chefskiss/Ricette/InfoRicetta/{$ricette->getId()}"><img class="card-img-top" src="data:{$immagini->getTipo()};base64, {$immagini->getImmagine()}" width=900 height=400 alt="..." /></a>
                        <div class="card-body">
                            <h2 class="card-title">{$ricette->getNomeRicetta()}</h2>
                            <p class="card-text">{substr($ricette->getProcedimento(), 0, 100)}...</p>
                            <div class="small text-muted">{$ricette->getData_()} &middot; Per {$ricette->getDosiPersone()} persone &middot;
                            {for $i = 0; $i < (int) $ricette->getValutazione(); $i++}
                                <i class="bi bi-star"></i>
                            {/for}
                            {if $ricette->getValutazione() == 0}
                                ancora nessuna recensione
                            {/if}
                        </div>
                    </div>
                </div>
        {else}
            <div class="row">
                <!-- Blog entries-->
                <div class="col-lg-8">
                    <!-- Featured blog post-->
                    <div class="card mb-4">
                        <a href="/chefskiss/Ricette/InfoRicetta/{$ricette[0]->getId()}"><img class="card-img-top" src="data:{$immagini[0]->getTipo()};base64,{$immagini[0]->getImmagine()}" width=900 height=400 alt="..." /></a>
                        <div class="card-body">
                            <h2 class="card-title">{$ricette[0]->getNomeRicetta()}</h2>
                            <p class="card-text">{substr($ricette[0]->getProcedimento(), 0, 100)}...</p>
                            <div class="small text-muted">{$ricette[0]->getData_()} &middot; Per {$ricette[0]->getDosiPersone()} persone &middot;
                            {for $i = 0; $i < (int) $ricette[0]->getValutazione(); $i++}
                                <i class="bi bi-star"></i>
                            {/for}
                            {if $ricette[0]->getValutazione() == 0}
                                ancora nessuna recensione
                            {/if}
                            </div>
                        </div>
                    </div>
                    <!-- Nested row for non-featured blog posts-->
                        <div class="row">
                            <div class="col-lg-6">
                                <!-- Blog post-->
                                {if count($ricette) >= 2}
                                    <div class="card mb-4">
                                        <a href="/chefskiss/Ricette/InfoRicetta/{$ricette[1]->getId()}"><img class="card-img-top" src="data:{$immagini[1]->getTipo()};base64,{$immagini[1]->getImmagine()}" width=900 height=400 alt="..." /></a>
                                        <div class="card-body">
                                            <h2 class="card-title h4">{$ricette[1]->getNomeRicetta()}</h2>
                                            <p class="card-text">{substr($ricette[1]->getProcedimento(), 0, 100)}...</p>
                                            <div class="small text-muted">{$ricette[1]->getData_()} &middot; Per {$ricette[1]->getDosiPersone()} persone &middot;
                                            {for $i = 0; $i < (int) $ricette[1]->getValutazione(); $i++}
                                                <i class="bi bi-star"></i>
                                            {/for}
                                            {if $ricette[1]->getValutazione() == 0}
                                                ancora nessuna recensione
                                            {/if}
                                            </div>
                                        </div>
                                    </div>
                                {/if}
                                <!-- Blog post-->
                                {if count($ricette) >= 3}
                                    <div class="card mb-4">
                                        <a href="/chefskiss/Ricette/InfoRicetta/{$ricette[2]->getId()}"><img class="card-img-top" src="data:{$immagini[2]->getTipo()};base64,{$immagini[2]->getImmagine()}" width=900 height=400 alt="..." /></a>
                                        <div class="card-body">
                                            <h2 class="card-title h4">{$ricette[2]->getNomeRicetta()}</h2>
                                            <p class="card-text">{substr($ricette[2]->getProcedimento(), 0, 100)}...</p>
                                            <div class="small text-muted">{$ricette[2]->getData_()} &middot; Per {$ricette[2]->getDosiPersone()} persone &middot;
                                            {for $i = 0; $i < (int) $ricette[2]->getValutazione(); $i++}
                                                <i class="bi bi-star"></i>
                                            {/for}
                                            {if $ricette[2]->getValutazione() == 0}
                                                ancora nessuna recensione
                                            {/if}
                                            </div>
                                        </div>
                                    </div>
                                {/if}
                            </div>
                        <div class="col-lg-6">
                            <!-- Blog post-->
                            {if count($ricette) >= 4}
                                <div class="card mb-4">
                                    <a href="/chefskiss/Ricette/InfoRicetta/{$ricette[3]->getId()}"><img class="card-img-top" src="data:{$immagini[3]->getTipo()};base64,{$immagini[3]->getImmagine()}" width=900 height=400 alt="..." /></a>
                                    <div class="card-body">
                                        <h2 class="card-title h4">{$ricette[3]->getNomeRicetta()}</h2>
                                        <p class="card-text">{substr($ricette[3]->getProcedimento(), 0, 100)}...</p>
                                        <div class="small text-muted">{$ricette[3]->getData_()} &middot; Per {$ricette[3]->getDosiPersone()} persone &middot;
                                        {for $i = 0; $i < (int) $ricette[3]->getValutazione(); $i++}
                                            <i class="bi bi-star"></i>
                                        {/for}
                                        {if $ricette[3]->getValutazione() == 0}
                                            ancora nessuna recensione
                                        {/if}
                                        </div>
                                    </div>
                                </div>
                            {/if}
                            <!-- Blog post-->
                            {if count($ricette) == 5}
                                <div class="card mb-4">
                                    <a href="/chefskiss/Ricette/InfoRicetta/{$ricette[4]->getId()}"><img class="card-img-top" src="data:{$immagini[4]->getTipo()};base64,{$immagini[4]->getImmagine()}" width=900 height=400 alt="..." /></a>
                                    <div class="card-body">
                                        <h2 class="card-title h4">{$ricette[4]->getNomeRicetta()}</h2>
                                        <p class="card-text">{substr($ricette[4]->getProcedimento(), 0, 100)}...</p>
                                        <div class="small text-muted">{$ricette[4]->getData_()} &middot; Per {$ricette[4]->getDosiPersone()} persone &middot;
                                        {for $i = 0; $i < (int) $ricette[4]->getValutazione(); $i++}
                                            <i class="bi bi-star"></i>
                                        {/for}
                                        {if $ricette[4]->getValutazione() == 0}
                                            ancora nessuna recensione
                                        {/if}
                                        </div>
                                    </div>
                                </div>
                            {/if}
                        </div>
                        </div>
                    {/if}
                    <!-- Pagination-->
                    <nav aria-label="Pagination">
                        <hr class="my-0" />
                        <ul class="pagination justify-content-center my-4">
                            {if $searchMod == 'searchOff'}
                                {if $index == 1}
                                    <li class="page-item disabled"><a class="page-link" href="#" tabindex="-1" aria-disabled="true">Back</a></li>
                                    <li class="page-item active" aria-current="page"><a class="page-link" href="/chefskiss/Ricette/EsploraLeRicette//{$index}">{$index}</a></li>
                                    {if $index + 1 < $num_pagine}
                                        <li class="page-item"><a class="page-link" href="/chefskiss/Ricette/EsploraLeRicette//{$index + 1}">{$index + 1}</a></li>
                                    {/if}
                                    {if $index + 2 < $num_pagine}
                                        <li class="page-item"><a class="page-link" href="/chefskiss/Ricette/EsploraLeRicette//{$index + 2}">{$index + 2}</a></li>
                                    {/if}
                                {else}
                                    <li class="page-item"><a class="page-link" href="/chefskiss/Ricette/EsploraLeRicette//{$index - 1}" tabindex="-1" aria-disabled="true">Back</a></li>
                                    <li class="page-item" aria-current="page"><a class="page-link" href="/chefskiss/Ricette/EsploraLeRicette//{$index - 1}">{$index - 1}</a></li>
                                    <li class="page-item active"><a class="page-link" href="/chefskiss/Ricette/EsploraLeRicette//{$index}">{$index}</a></li>
                                    {if $index + 1 < $num_pagine}
                                        <li class="page-item"><a class="page-link" href="/chefskiss/Ricette/EsploraLeRicette//{$index + 1}">{$index + 1}</a></li>
                                    {/if}
                                {/if}
                                {if $num_pagine <= $index + 1 && $num_pagine != $index}
                                    <li class="page-item"><a class="page-link" href="/chefskiss/Ricette/EsploraLeRicette//{$num_pagine}">{$num_pagine}</a></li>
                                {elseif $index < $num_pagine - 1}
                                    <li class="page-item disabled"><a class="page-link" href="#!">...</a></li>
                                    <li class="page-item"><a class="page-link" href="/chefskiss/Ricette/EsploraLeRicette//{$num_pagine}">{$num_pagine}</a></li>
                                {/if}
                                {if $num_pagine >= $index + 1}
                                    <li class="page-item"><a class="page-link" href="/chefskiss/Ricette/EsploraLeRicette//{$index + 1}">Next</a></li>
                                {else}
                                    <li class="page-item disabled"><a class="page-link" href="/chefskiss/Ricette/EsploraLeRicette//{$index + 1}">Next</a></li>
                                {/if}
                                {else}
                                {if $index == 1}
                                    <li class="page-item disabled"><a class="page-link" href="#" tabindex="-1" aria-disabled="true">Back</a></li>
                                    <li class="page-item active" aria-current="page"><a class="page-link" href="/chefskiss/Ricette/EsploraLeRicette/cerca/{$index}">{$index}</a></li>
                                    {if $index + 1 < $num_pagine}
                                        <li class="page-item"><a class="page-link" href="/chefskiss/Ricette/EsploraLeRicette/cerca/{$index + 1}">{$index + 1}</a></li>
                                    {/if}
                                    {if $index + 2 < $num_pagine}
                                        <li class="page-item"><a class="page-link" href="/chefskiss/Ricette/EsploraLeRicette/cerca/{$index + 2}">{$index + 2}</a></li>
                                    {/if}
                                {else}
                                    <li class="page-item"><a class="page-link" href="/chefskiss/Ricette/EsploraLeRicette/cerca/{$index - 1}" tabindex="-1" aria-disabled="true">Back</a></li>
                                    <li class="page-item" aria-current="page"><a class="page-link" href="/chefskiss/Ricette/EsploraLeRicette/cerca/{$index - 1}">{$index - 1}</a></li>
                                    <li class="page-item active"><a class="page-link" href="/chefskiss/Ricette/EsploraLeRicette/cerca/{$index}">{$index}</a></li>
                                    {if $index + 1 < $num_pagine}
                                        <li class="page-item"><a class="page-link" href="/chefskiss/Ricette/EsploraLeRicette/cerca/{$index + 1}">{$index + 1}</a></li>
                                    {/if}
                                {/if}
                                {if $num_pagine <= $index + 1 && $num_pagine != $index}
                                    <li class="page-item"><a class="page-link" href="/chefskiss/Ricette/EsploraLeRicette/cerca/{$num_pagine}">{$num_pagine}</a></li>
                                {elseif $index < $num_pagine - 1}
                                    <li class="page-item disabled"><a class="page-link" href="#!">...</a></li>
                                    <li class="page-item"><a class="page-link" href="/chefskiss/Ricette/EsploraLeRicette/cerca/{$num_pagine}">{$num_pagine}</a></li>
                                {/if}
                                {if $num_pagine >= $index + 1}
                                <li class="page-item"><a class="page-link" href="/chefskiss/Ricette/EsploraLeRicette/cerca/{$index + 1}">Next</a></li>
                                    {else}
                                    <li class="page-item disabled"><a class="page-link" href="/chefskiss/Ricette/EsploraLeRicette/cerca/{$index + 1}">Next</a></li>
                                {/if}
                            {/if}
                        </ul>
                    </nav>
                </div>
                <!-- Side widgets-->
                <div class="col-lg-4">
                    <!-- Search widget-->
                    <!--<button type="button" class="btn btn-secondary" data-container="body" data-toggle="popover" data-placement="top" data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus.">Popover on top</button>-->
                    <div class="card mb-4">
                        <div class="card-header">Search</div>
                        <div class="card-body">
                        <form method="POST" action="/chefskiss/Ricette/cerca">
                            <div class="input-group">
                            <input class="form-control" name="text" type="text" placeholder="Enter search term..." aria-label="Enter search term..." aria-describedby="button-search" />
                            <button class="btn btn-primary" id="button-search" type="submit">Go!</button>
                            </div>
                        </form>
                        </div>
                    </div>
                    <!-- Categories widget-->
                    <div class="card mb-4">
                        <div class="card-header">Categories</div>
                        <div class="card-body">
                        <div class="row">
                        <div class="col-sm-6">
                            <ul class="list-unstyled mb-0">
                            {$value = sizeof($categorie)/2}
                            {if $categorie != null}
                                {if is_array($categorie)}
                                    {for $i = 0; $i < (int)$value; $i++}
                                        <li><a href="/chefskiss/Ricette/cerca?categoria={$categorie[$i]->getCategoria()}">{$categorie[$i]->getCategoria()}</a></li>
                                    {/for}
                                    </ul>
                                </div>
                                    <div class="col-sm-6">
                                        <ul class="list-unstyled mb-0">
                                            {for $i = $value; $i < sizeof($categorie); $i++}
                                                <li><a href="/chefskiss/Ricette/cerca?categoria={$categorie[$i]->getCategoria()}">{$categorie[$i]->getCategoria()}</a></li>
                                            {/for}
                                        </ul>
                                    </div>
                                {else}
                                        <li><a href="/chefskiss/Ricette/cerca?categoria={$categorie->getCategoria()}">{$categorie->getCategoria()}</a></li>
                                    </ul>
                                </div>
                                {/if}
                            {/if}
                        </div>
                    </div>
                    <!-- Side widget-->
                    <!--<div class="card mb-4">
                        <div class="card-header">Side Widget</div>
                        <div class="card-body">You can put anything you want inside of these side widgets. They are easy to use, and feature the Bootstrap 5 card component!</div>
                    </div>-->
                </div>
            </div>
        </div>
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
