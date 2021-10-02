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
            <a class="navbar-brand" href="index.tpl">Chef's kiss</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link" href="/chefskiss/">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Contact</a></li>
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
                <div class="pro-img"><img src="https://i.imgur.com/8RKXAIV.jpg" alt="user"></div><!--./smarty/libs/assets/background_profilo.jpg-->
                <div class="ms-3">
                    <h3 class="m-b-0">{$utente->getNome()} {$utente->getCognome()}</h3>
                    {if $utente->getPrivilegi() == 1 & $utente->getBan()==0}
                        <p class="text-muted">Membro</p>
                        <a class="nav-link" href="/chefskiss/Admin/nuovoModeratore/{$utente->getId()}"> Rendi Moderatore</a>

                        <form name="form" action="/chefskiss/Admin/bannaUtente/{$utente->getId()}" method="post">
                            <p>Banna utente fino al</p>
                            <input type="date" name="date" value="">
                            <button type="submit">Invia</button>
                        </form>


                    {/if}
                    {if $utente->getPrivilegi() == 2}
                        <p class="text-muted">Moderatore</p>
                        <a class="nav-link" href="/chefskiss/Admin/togliModeratore/{$utente->getId()}"> Rimuovi Moderatore</a>
                    {/if}
                    {if $utente->getPrivilegi() == 3}
                        <p class="text-muted">Amministratore</p>
                    {/if}

                </div>
                {if $utente->getBan() == true}
                    <p class="text-muted">Utente bannato fino al {$utente->getDataFineBan()}</p>
                {/if}





                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
