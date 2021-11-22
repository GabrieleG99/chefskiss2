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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
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
            <section class="py-5">
                <div class="container px-5 my-5">
                    <div class="row gx-5">
                        <div class="col-lg-3">
                            <div class="d-flex align-items-center mt-lg-5 mb-4">
                                <img class="img-fluid rounded-circle" src="data:{$immagine_autore->getTipo()};base64,{$immagine_autore->getImmagine()}" width=40 height=40 alt="..." />
                                <div class="ms-3">
                                    <a href="/chefskiss/Utente/profilo/{$utente->getId()}" class="fw-bold">{$utente->getNome()} {$utente->getCognome()}</a>
                                    {if $utente->getPrivilegi() == 1}
                                        <div class="text-muted">Membro</div>
                                    {/if}
                                    {if $utente->getPrivilegi() == 2}
                                        <div class="text-muted">Moderatore</div>
                                    {/if}
                                    {if $utente->getPrivilegi() == 3}
                                        <div class="text-muted">Amministratore</div>
                                    {/if}
                                </div>
                            </div>
                            {if {$mod != null && $mod->getPrivilegi()>=2 }}
                                <button class="border rounded-2 btn-outline-light my-3">
                                    <a class="nav-link" href="/chefskiss/Moderatore/rimuoviRicetta/{$ricetta->getId()}/{$ricetta->getId_immagine()}"> Rimuovi Ricetta </a>
                                </button>
                                {if $mod->getId() == $ricetta->getAutore()}
                                <button class="border rounded-2 btn-outline-light my-3">
                                    <a class="nav-link" href="/chefskiss/Ricette/modificaRicetta/{$ricetta->getId()}"> Modifica Ricetta </a>
                                </button>
                                {/if}
                            {elseif {$mod !=null && $mod->getId() == $ricetta->getAutore()}}
                                <button class="border rounded-2 btn-outline-light my-3">
                                    <a class="nav-link" href="/chefskiss/Utente/cancellaRicetta/{$ricetta->getId()}/{$ricetta->getId_immagine()}"> Cancella Ricetta </a>
                                </button>
                                <button class="border rounded-2 btn-outline-light my-3">
                                    <a class="nav-link" href="/chefskiss/Ricette/modificaRicetta/{$ricetta->getId()}"> Modifica Ricetta </a>
                                </button>
                            {/if}
                        </div>
                        <div class="col-lg-9">
                            <!-- Post content-->
                            <article>
                                <!-- Post header-->
                                <header class="mb-4">
                                    <!-- Post title-->
                                    <h1 class="fw-bolder mb-1">{$ricetta->getNomeRicetta()}</h1>
                                    <!-- Post meta content-->
                                    <div class="text-muted fst-italic mb-2">{$ricetta->getData_()} &middot; 
                                    {for $i = 0; $i < (int)$ricetta->getValutazione(); $i++}
                                        <i class="bi bi-star"></i>
                                    {/for}
                                    {if $ricetta->getValutazione() == 0}
                                        ancora nessuna recensione
                                    {/if}
                                    </div>
                                    <!-- Post categories-->
                                    <a class="badge bg-secondary text-decoration-none link-light" href="#!">{ucfirst($ricetta->getCategoria())}</a>
                                </header>
                                <!-- Preview image figure-->
                                <figure class="mb-4"><img class="img-fluid rounded" src="data:{$immagine->getTipo()};base64,{$immagine->getImmagine()}" width=900 height=400 alt="..." /></figure>
                                <h2>Ingredienti</h2>
                                <ul>
                                    {for $i = 0; $i < count($ricetta->parseIngredienti()); $i++}
                                        {$ingredienti = $ricetta->parseIngredienti()}
                                        <li> {$ingredienti[$i]} </li>
                                    {/for}
                                </ul>
                                <!-- Post content-->
                                <section class="mb-5">
                                <h2>Procedimento</h2>
                                    {for $i = 0; $i < count($procedimento); $i++}
                                        <p class="fs-5 mb-4">{$procedimento[$i]}</p>
                                    {/for}
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
                                                        {if is_array($valutato)}
                                                            {for $j = (int)$valutato[1] + 1; $j <= 5; $j++}
                                                                <input disabled class="star star-{strval($j)}" id="star-{strval($j)}" type="radio" name="checked-star"/><label class="star star-{strval($j)}" for="star-{strval($j)}"></label>
                                                            {/for}
                                                            {for $i = 1; $i <= (int)$valutato[1]; $i++}
                                                                <input class="star star-{strval($i)}" id="star-{strval($i)}" type="checkbox" name="checked-star" disabled checked/><label class="star star-{strval($i)}" for="star-{strval($i)}"></label>
                                                            {/for}
                                                        {else}
                                                            <input class="star star-5" id="star-5" type="radio" name="star" value="5"/> <label class="star star-5" for="star-5"></label> <input class="star star-4" id="star-4" type="radio" name="star" value="4"/> <label class="star star-4" for="star-4"></label> <input class="star star-3" id="star-3" type="radio" name="star" value="3"/> <label class="star star-3" for="star-3"></label> <input class="star star-2" id="star-2" type="radio" name="star" value="2"/> <label class="star star-2" for="star-2"></label> <input class="star star-1" id="star-1" type="radio" name="star" value="1"/> <label class="star star-1" for="star-1"></label>
                                                        {/if}
                                                    </div>
                                                </div>
                                            </div>
                                            <button class="rounded-1 border" type="submit">Invia</button>
                                        </form>
                                        {if $array}
                                            {if is_array($array)}
                                                {if is_array($array[0])}
                                                    {for $i = 0; $i < sizeof($array[0]); $i++}
                                                        <div class="d-flex">
                                                            <div class="flex-shrink-0"><img class="rounded-circle" src="data:{$array[2][$i]->getTipo()};base64,{$array[2][$i]->getImmagine()}" width=40 height=40 alt="..." />
                                                                {if {$mod != null && $mod->getPrivilegi()>=2 }}
                                                                    <button class="btn">
                                                                        <i class="fa fa-trash"></i>
                                                                        <a class="nav-link" href="/chefskiss/Moderatore/rimuoviRecensione/{$array[0][$i]->getId()}/{$ricetta->getId()}">Rimuovi</a>
                                                                    </button>
                                                                {elseif {$mod !=null && $mod->getId() == $array[1][$i]->getId()}}
                                                                    <button class="btn">
                                                                        <i class="fa fa-trash"></i>
                                                                        <a class="nav-link" href="/chefskiss/Utente/cancellaRecensione/{$array[0][$i]->getId()}"> Cancella </a>
                                                                    </button>
                                                                {else}
                                                                {/if}
                                                            </div>
                                                            <div class="ms-3">
                                                                <div><a href="/chefskiss/Utente/profilo/{$array[1][$i]->getId()}" class="fw-bold">{$array[1][$i]->getNome()} {$array[1][$i]->getCognome()}</a>
                                                                {for $j = 0; $j < (int)$array[0][$i]->getValutazione(); $j++}
                                                                    <i class="bi bi-star"></i>
                                                                {/for}
                                                                </div>
                                                                {$array[0][$i]->getCommento()} <div class="text-end d-flex">{$array[0][$i]->getData_pubblicazione()}</div>
                                                            </div>
                                                        </div>
                                                    {/for}
                                                {else}
                                                <div class="d-flex">
                                                    <div class="flex-shrink-0"><img class="rounded-circle" src="data:{$array[2]->getTipo()};base64,{$array[2]->getImmagine()}" width=40 height=40 alt="..." />
                                                        {if {$mod != null && $mod->getPrivilegi()>=2 }}
                                                            <button class="btn">
                                                                <i class="fa fa-trash"></i>
                                                                <a class="nav-link" href="/chefskiss/Moderatore/rimuoviRecensione/{$array[0]->getId()}/{$ricetta->getId()}">Rimuovi</a>
                                                            </button>
                                                        {elseif {$mod !=null && $mod->getId() == $array[1]->getId()}}
                                                            <button class="btn">
                                                                <i class="fa fa-trash"></i>
                                                                <a class="nav-link" href="/chefskiss/Utente/cancellaRecensione/{$array[0]->getId()}"> Cancella </a>
                                                            </button>
                                                        {else}
                                                        {/if}
                                                    </div>
                                                    <div class="ms-3">
                                                        <div><a href="/chefskiss/Utente/profilo/{$array[1]->getId()}" class="fw-bold">{$array[1]->getNome()} {$array[1]->getCognome()}</a> 
                                                        {for $i = 0; $i < (int)$array[0]->getValutazione(); $i++}
                                                            <i class="bi bi-star"></i>
                                                        {/for}
                                                        </div>
                                                        {$array[0]->getCommento()} <div class="text-end">{$array[0]->getData_pubblicazione()}</div>
                                                    </div>
                                                </div>
                                                {/if}
                                            {/if}
                                        {/if}
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
