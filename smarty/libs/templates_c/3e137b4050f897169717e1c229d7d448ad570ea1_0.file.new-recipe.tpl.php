<?php
/* Smarty version 3.1.39, created on 2021-11-11 09:28:54
  from 'C:\xampp\htdocs\chefskiss\smarty\libs\templates\new-recipe.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_618cd4467bc599_37140301',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3e137b4050f897169717e1c229d7d448ad570ea1' => 
    array (
      0 => 'C:\\xampp\\htdocs\\chefskiss\\smarty\\libs\\templates\\new-recipe.tpl',
      1 => 1636619288,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_618cd4467bc599_37140301 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">

    <title>Chef's Kiss</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="/chefskiss/smarty/libs/assets/chef-hat.png" />
    <!--google fonts-->
    <link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Karla:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <!--jquery ui stylesheet-->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">

    <!-- site favicon -->
    <!--<link rel="icon" href="../assets/background_profilo.jpg" />-->
    

    <!--selectric stylesheet-->
    <link rel="stylesheet" href="/chefskiss/smarty/libs/css/new_recipe.css"/>
    <!--font awesome stylesheet-->
    <link rel="stylesheet" href="/chefskiss/smarty/libs/css/font-awesome.min.css"/>
</head>
<body>
<!--pre-loader-->
<div class="preloader">
    <div class="loadr">
        <svg  viewbox="0 0 74.6 81">
            <path d="M67.8,12.9C51.7,5.2,26.2,0.2,26.2,0.2c-10.9-1.8-9.3,11.4-9,20.2c0,0.7,0.1,1.4,0.1,2c7.8,1.5,19.7,4,29.2,7.4c11.4,4.1,9.6,8.3,9.2,16c-0.2,4.9-0.4,14,1.1,21.3c7.7,1.4,13.8,1.9,13.1-0.3c-6.3-7.2-0.1-29.6,1.8-34.2C73.3,28.7,79.3,18.4,67.8,12.9z">      </path>
            <path d="M58.9,79.5c-6.5-5.6-6.2-23.6-5.8-31.3c0.4-7.7,2.1-11.9-9.2-16c-15.3-5.5-37.3-8.8-37.3-8.8c-9.1-1.1-6.6,8.4-5.5,15.1c1.7,10,5.4,22,7.9,27.8c2.8,6.5,8.9,7.3,8.9,7.3S65.4,85.1,58.9,79.5z"></path>
        </svg>
    </div>
</div>
<!--pre-loader ends-->
<!--banner-->
<div class="banner banner-blog heading-background"></div>

<div class="recipes-home-body inner-page">
    <div class="container">
    <div class="row">
    <div class="col-md-8 col-lg-9">
        <div class="recipe-set submit-recipe-set">
            <h2>Pubblica una nuova ricetta</h2>
            <div class="submit-recipe-form">
                <form action="/chefskiss/Ricette/pubblicaRicetta" method="post" enctype="multipart/form-data">
                    <label for="title">Dai un nome alla tua ricetta</label>
                    <input type="text" name="title" id="title" required/>
                    <br/>
                    <label for="recipe-content">Come hai realizzato la tua ricetta?</label>
                    <textarea name="content" id="recipe-content" cols="30" rows="10" required></textarea>
                    <label for="upload-image">Fai una foto al tuo piatto</label>
                    <input type="file" name="file" id="upload-image" required/>
                    <fieldset class="ingredient-set">
                        <label for="ingredients">Inserisci gli ingredienti usati</label>
                        <ul class="list-sortable ingredients-list">
                            <li>
                                <div class="add-fields">
                                    <span class="handler-list"><i class="fa fa-arrows"></i></span>
                                    <input type="text" placeholder="farina: 200g" name="ingredients[]" id="ingredients"/>
                                    <span class="del-list"><i><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                      </svg></i></span>
                                </div>
                            </li>
                        </ul>
                        <span class="add-button add-ing pull-right">
                        <i><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                        </svg></i>
                    </span>
                    </fieldset>
                    <div class="row">
                        <div class="col-sm-6">
                            <label for="recipe-type">Categoria</label>
                            <select name="recipe-type" id="recipe-type" class="advance-selectable">
                                <option value="antipasti">Antipasti</option>
                                <option value="primi">Primi</option>
                                <option value="secondi">Secondi</option>
                                <option value="contorni">Contorni</option>
                                <option value="salse">Salse</option>
                                <option value="dessert">Dessert</option>
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <label for="servings">Numero Dosi </label>
                            <br>
                            <input type="number" min="1" placeholder="1" name="servings" id="servings" required/>
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="recipe-submit-btn">Pubblica la tua ricetta</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-4 col-lg-3">
        <aside>
            <div class="side-bar">
                <img src="/chefskiss/smarty/libs/assets/bg-heading-02.jpg" alt="...">
            </div>
        </aside>
    </div>
</div>

<?php echo '<script'; ?>
 src="/chefskiss/smarty/libs/js/jquery-1.11.3.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="/chefskiss/smarty/libs/js/jquery-ui.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="/chefskiss/smarty/libs/js/jquery.selectric.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="/chefskiss/smarty/libs/js/wow.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="/chefskiss/smarty/libs/js/custom.js"><?php echo '</script'; ?>
>

</body>
</html><?php }
}
