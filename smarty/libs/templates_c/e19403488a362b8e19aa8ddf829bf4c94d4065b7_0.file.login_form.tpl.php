<?php
/* Smarty version 3.1.39, created on 2021-09-08 02:27:02
  from '/Users/gabrielegiusti/public_html/ChefsKiss/chefskiss/smarty/libs/templates/login_form.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_61380356181a33_44791499',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e19403488a362b8e19aa8ddf829bf4c94d4065b7' => 
    array (
      0 => '/Users/gabrielegiusti/public_html/ChefsKiss/chefskiss/smarty/libs/templates/login_form.tpl',
      1 => 1631060820,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61380356181a33_44791499 (Smarty_Internal_Template $_smarty_tpl) {
?><!doctype html>
    <html>
        <head>
            <meta charset='utf-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1'>
            <title>Chef's Kiss - Forum e Ricette</title>
            <link href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css' rel='stylesheet'>
            <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css' rel='stylesheet'>
            <link href="../smarty/libs/css/style.css" rel="stylesheet" type="text/css">
            <?php echo '<script'; ?>
 type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'><?php echo '</script'; ?>
>

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
        <body oncontextmenu='return false' class='snippet-body'>
            <div class="container-fluid px-1 px-md-5 px-lg-1 px-xl-5 py-5 mx-auto">
            <div class="card card0 border-0">
                <div class="row d-flex">
                    <div class="col-lg-6">
                        <div class="card1 pb-5">
                            <div class="row"> <img src="https://i.imgur.com/CXQmsmF.png" class="logo"> </div>
                            <div class="row px-3 justify-content-center mt-4 mb-5 border-line"> <img src="https://i.imgur.com/uNGdWHi.png" class="image"> </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card2 card border-0 px-4 py-5">
                            <div class="row mb-4 px-3">
                                <h6 class="mb-0 mr-4 mt-2">Sign in with</h6>
                                <div class="facebook text-center mr-3">
                                    <div class="fa fa-facebook"></div>
                                </div>
                                <div class="twitter text-center mr-3">
                                    <div class="fa fa-twitter"></div>
                                </div>
                                <div class="linkedin text-center mr-3">
                                    <div class="fa fa-linkedin"></div>
                                </div>
                            </div>
                            <div class="row px-3 mb-4">
                                <div class="line"></div> <small class="or text-center">Or</small>
                                <div class="line"></div>
                            </div>
                            <form method="POST" action="../chefskiss/Utente/login">
                                <div class="row px-3"> <label class="mb-1">
                                        <h6 class="mb-0 text-sm">Email Address</h6>
                                    </label> <input class="mb-4" type="text" name="email" placeholder="Enter a valid email address"> </div>
                                <div class="row px-3"> <label class="mb-1">
                                        <h6 class="mb-0 text-sm">Password</h6>
                                    </label> <input type="password" name="password" placeholder="Enter password"> </div>
                                <div class="row px-3 mb-4">
                                    <div class="custom-control custom-checkbox custom-control-inline"> <input id="chk1" type="checkbox" name="chk" class="custom-control-input"> <label for="chk1" class="custom-control-label text-sm">Remember me</label> </div> <a href="#" class="ml-auto mb-0 text-sm">Forgot Password?</a>
                                </div>
                                <div class="row mb-3 px-3"> <button type="submit" class="nav-link btn btn-blue text-center">Login</button> </div>
                            </form>
                            <div class="row mb-4 px-3"> <small class="font-weight-bold">Don't have an account? <a class="text-danger ">Register</a></small> </div>
                        </div>
                    </div>
                </div>
                <div class="bg-blue py-4">
                    <div class="row px-3"> <small class="ml-4 ml-sm-5 mb-2">Copyright &copy; 2019. All rights reserved.</small>
                        <div class="social-contact ml-4 ml-sm-auto"> <span class="fa fa-facebook mr-4 text-sm"></span> <span class="fa fa-google-plus mr-4 text-sm"></span> <span class="fa fa-linkedin mr-4 text-sm"></span> <span class="fa fa-twitter mr-4 mr-sm-5 text-sm"></span> </div>
                    </div>
                </div>
            </div>
        </div>
        <?php echo '<script'; ?>
 type='text/javascript' src='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js'><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 type='text/javascript'><?php echo '</script'; ?>
>
    </body>
</html><?php }
}
