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
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" />
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
                        <li class="nav-item text-light">
                            <a class="nav-link" href="/chefskiss/Utente/profilo">Profilo</a>
                        </li>
                        <li class="nav-item text-light">
                            <a class="nav-link" href="/chefskiss/Utente/logout">Disconnetti</a>
                        </li>

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
    <!-- Column -->
    <div class="d-flex">
        <div class="flex-shrink-0"><img class="rounded-circle" src="data:{$immagine->getTipo()};base64,{$immagine->getImmagine()}" width=100 height=100 alt="..." /></div>
        <div class="ms-3">
            <h3 class="m-b-0">{$utente->getNome()} {$utente->getCognome()}</h3>
            <p class="text-muted">Amministratore</p>
        </div>
        <h2 class="fw-bolder fs-5 mb-4 padding">Lista membri
            <input type="text" id="SearchTxt" /><input type="button" id="SearchBtn" value="Cerca" onclick="doSearch(document.getElementById('SearchTxt').value)" />
        </h2>
    </div>
</div>
</section>
<section class="py-5">
    <div class="container px-5">
        <script>
            function doSearch(text) {
                if (window.find(text)) {
                    console.log(window.find(text));
                }
            }
        </script>

        <div class="row gx-5" id="list">

            {if $list}
                {if is_array($list)}
                    {for $i = 0; $i < sizeof($list); $i++}
                        <div class="col-lg-4 mb-5">
                            <div class="card h-100 shadow border-0">
                                <div class="card-body p-4">
                                    <a href="/chefskiss/Admin/profiloUtente/{$list[$i]->getId()}" >{$list[$i]->getNome()} {$list[$i]->getCognome()}</a>
                                </div>
                            </div>
                        </div>
                    {/for}
                {/if}
            {else}
                <h2> Non ci sono membri iscritti </h2>
            {/if}
        </div>
    </div>
</section>
</body>
</html>