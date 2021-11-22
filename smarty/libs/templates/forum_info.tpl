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
        <link href="/chefskiss/smarty/libs/css/boot_styles.css" rel="stylesheet" />
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
                            <!--<li class="nav-item"><a class="nav-link" href="about.html">About</a></li>-->
                            <li class="nav-item"><a class="nav-link" href="/chefskiss/Contact/contattaci">Contact</a></li>
                            <!--<li class="nav-item"><a class="nav-link" href="pricing.html">Pricing</a></li>-->
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
                                    <a class="nav-link" href="/chefskiss/Moderatore/rimuoviPost/{$post->getId()}/{$post->getId_immagine()}"> Rimuovi Post </a>
                                </button>
                                {if $mod->getId() == $post->getAutore()}
                                <button class="border rounded-2 btn-outline-light my-3">
                                    <a class="nav-link" href="/chefskiss/Forum/modificaPost/{$post->getId()}"> Modifica Post </a>
                                </button>
                                {/if}
                            {elseif {$mod !=null && $mod->getId() == $post->getAutore()}}
                                <button class="border rounded-2 btn-outline-light my-3">
                                    <a class="nav-link" href="/chefskiss/Utente/cancellaPost/{$post->getId()}/{$post->getId_immagine()}"> Cancella Post </a>
                                </button>
                                <button class="border rounded-2 btn-outline-light my-3">
                                    <a class="nav-link" href="/chefskiss/Forum/modificaPost/{$post->getId()}"> Modifica Post </a>
                                </button>
                            {/if}
                        </div>
                        <div class="col-lg-9">
                            <!-- Post content-->
                            <article>
                                <!-- Post header-->
                                <header class="mb-4">
                                    <!-- Post title-->
                                    <h1 class="fw-bolder mb-1">{$post->getTitolo()}</h1>
                                    <!-- Post meta content-->
                                    <div class="text-muted fst-italic mb-2">{$post->getData_pubb()}</div>
                                    <!-- Post categories-->
                                    <a class="badge bg-secondary text-decoration-none link-light" href="#!">{ucfirst($post->getCategoria())}</a>
                                </header>
                                <!-- Preview image figure-->
                                <figure class="mb-4"><img class="img-fluid rounded" src="data:{$immagine->getTipo()};base64,{$immagine->getImmagine()}" width=900 height=400 alt="..." /></figure>
                                <!-- Post content-->
                                <section class="mb-5">
                                {if count($domanda) != 1}
                                    {for $i = 0; $i < count($domanda) - 1; $i++}
                                        <p class="fs-5 mb-4">{$domanda[$i]}.</p>
                                    {/for}
                                {else}
                                    <p class="fs-5 mb-4">{$domanda[0]}.</p>
                                {/if}
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
                                        {if $array}
                                            {if is_array($array)}
                                                {if is_array($array[0])}
                                                    {for $i = 0; $i < sizeof($array[0]); $i++}
                                                        <div class="d-flex">
                                                            <div class="flex-shrink-0"><img class="rounded-circle" src="data:{$array[2][$i]->getTipo()};base64,{$array[2][$i]->getImmagine()}" width=40 height=40 alt="..." />
                                                                {if {$mod != null && $mod->getPrivilegi()>=2 }}
                                                                    <button class="btn">
                                                                        <i class="fa fa-trash"></i>
                                                                        <a class="nav-link" href="/chefskiss/Moderatore/rimuoviCommento/{$array[0][$i]->getId()}/{$post->getId()}">Rimuovi</a>
                                                                    </button>
                                                                {elseif {$mod !=null && $mod->getId() == $array[1][$i]->getId()}}
                                                                    <button>
                                                                        <i class="fa fa-trash"></i>
                                                                        <a class="nav-link" href="/chefskiss/Utente/cancellaCommento/{$array[0][$i]->getId()}"> Cancella </a>
                                                                    </button>
                                                                {else}
                                                                {/if}
                                                            </div>
                                                            <div class="ms-3">
                                                                <div><a href="/chefskiss/Utente/profilo/{$array[1][$i]->getId()}" class="fw-bold">{$array[1][$i]->getNome()} {$array[1][$i]->getCognome()}</a></div>
                                                                {$array[0][$i]->getTesto()} <div class="text-start text-muted">{$array[0][$i]->getData()}</div>
                                                            </div>
                                                        </div>
                                                    {/for}
                                                {else}
                                                    <div class="d-flex">
                                                        <div class="flex-shrink-0"><img class="rounded-circle" src="data:{$array[2]->getTipo()};base64,{$array[2]->getImmagine()}" width=40 height=40 alt="..." />
                                                            {if {$mod != null && $mod->getPrivilegi()>=2 }}
                                                                <button class="btn">
                                                                    <i class="fa fa-trash"></i>
                                                                    <a class="nav-link" href="/chefskiss/Moderatore/rimuoviCommento/{$array[0]->getId()}/{$post->getId()}">Rimuovi</a>
                                                                </button>
                                                            {elseif {$mod !=null && $mod->getId() == $array[1]->getId()}}
                                                                <button>
                                                                    <a class="nav-link" href="/chefskiss/Utente/cancellaCommento/{$array[0]->getId()}"> Cancella </a>
                                                                </button>
                                                            {else}
                                                            {/if}
                                                        </div>
                                                        <div class="ms-3">
                                                        <div><a href="/chefskiss/Utente/profilo/{$array[1]->getId()}" class="fw-bold">{$array[1]->getNome()} {$array[1]->getCognome()}</a></div>
                                                            {$array[0]->getTesto()} <div class="text-start text-muted">{$array[0]->getData()}</div>
                                                            
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
