<!DOCTYPE html>
{assign var='userlogged' value=$userlogged|default:'nouser'}
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
        <link href="/chefskiss/smarty/libs/css/edit-profile.css" rel="stylesheet" type="text/css"/>

    <script>
        function ready(){
            if (!navigator.cookieEnabled) {
                alert('Attenzione! Attivare i cookie per proseguire correttamente la navigazione');
            }
        }
        document.addEventListener("DOMContentLoaded", ready);
    </script>

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
                            <!--<li class="nav-item"><a class="nav-link" href="about.html">About</a></li>-->
                            <li class="nav-item"><a class="nav-link" href="#">Contact</a></li>
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
            <form class="form-select-lg" action="/chefskiss/Utente/confermaModifiche" method="post" enctype="multipart/form-data">
                <div class="container">
                    <div class="row height d-flex justify-content-center align-items-center">
                        <div class="col-md-8">
                            <div class="card py-5">
                                <div class="inputs px-4"> <span class="text-uppercase">Email</span> <input disabled type="text" name="email" class="form-control" value="{$utente->getEmail()}"> </div>
                                <div class="row mt-3 g-2">
                                    <div class="col-md-6">
                                        <div class="inputs px-4"> <span class="text-uppercase">Nome</span> <input type="text" name="nome" class="form-control" value="{$utente->getNome()}"> </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="inputs px-4"> <span class="text-uppercase">Cognome</span> <input type="text" name="cognome" class="form-control" value="{$utente->getCognome()}"> </div>
                                    </div>
                                </div>
                                <div class="mt-3 px-4"> <span class="text-uppercase name">Foto Profilo</span>
                                    <div class="d-flex flex-row align-items-center mt-2"> <img src="data:{$immagine_utente->getTipo()};base64,{$immagine_utente->getImmagine()}" width=80 height=80 alt="user" class="rounded">
                                        <div class="ml-3"><input class="btn btn-outline-secondary" type="file" name="file" id="upload-image" /></div>
                                    </div>
                                </div>
                                <div class="mt-3 px-4 d-flex justify-content-between align-items-center"> <button type="submit" class="btn btn-primary">Salva Modifiche</button> </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </main>
    </body>
</html>