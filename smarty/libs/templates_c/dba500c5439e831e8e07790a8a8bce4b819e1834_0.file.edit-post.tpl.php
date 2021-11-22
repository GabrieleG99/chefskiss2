<?php
/* Smarty version 3.1.39, created on 2021-11-22 17:30:19
  from 'C:\xampp\htdocs\chefskiss\smarty\libs\templates\edit-post.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_619bc59b0beac9_35068620',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'dba500c5439e831e8e07790a8a8bce4b819e1834' => 
    array (
      0 => 'C:\\xampp\\htdocs\\chefskiss\\smarty\\libs\\templates\\edit-post.tpl',
      1 => 1637598615,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_619bc59b0beac9_35068620 (Smarty_Internal_Template $_smarty_tpl) {
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
    <link rel="icon" type="image/x-icon" href="/chefskiss/smarty/libs/assets/chef-hat.png" />
    

    <!--selectric stylesheet-->
    <link rel="stylesheet" href="/chefskiss/smarty/libs/css/new_recipe.css"/>
    <!--font awesome stylesheet-->
    <link rel="stylesheet" href="/chefskiss/smarty/libs/css/font-awesome.min.css"/>
</head>
<body>
<!--pre-loader-->
<div class="preloader">
    <div class="loadr">
        <svg viewbox="0 0 74.6 81">
            <img class="align-center" src="/chefskiss/smarty/libs/assets/chef-hat.svg" height="50" width="50"/>
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
            <h2>Pubblica un nuovo Post</h2>
            <div class="submit-recipe-form">
                <form action="/chefskiss/Forum/confermaModifiche/<?php echo $_smarty_tpl->tpl_vars['post']->value->getid();?>
/<?php echo $_smarty_tpl->tpl_vars['immagine']->value->getid();?>
" method="post" enctype="multipart/form-data">
                    <label for="title">Cambia il titolo al tuo post</label>
                    <input value="<?php echo $_smarty_tpl->tpl_vars['post']->value->getTitolo();?>
" type="text" name="title" id="title" required/>
                    <br/>
                    <label for="recipe-content">Modifica la tua domanda</label>
                    <textarea name="content" id="recipe-content" cols="30" rows="10" required><?php echo $_smarty_tpl->tpl_vars['post']->value->getdomanda();?>
</textarea>
                    <label for="upload-image">Modifica la foto</label>
                    <input type="file" name="file" id="upload-image"/>
                    <div class="d-flex flex-row align-items-center mt-2"><img src="data:<?php echo $_smarty_tpl->tpl_vars['immagine']->value->getTipo();?>
;base64,<?php echo $_smarty_tpl->tpl_vars['immagine']->value->getImmagine();?>
" width=80 height=80 alt="ricetta" class="rounded">
                    <!--<fieldset class="ingredient-set">
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
                    </fieldset>-->
                    <div class="row">
                        <div class="col-sm-6">
                            <label for="recipe-type">Categoria</label>
                            <select name="post-type" id="recipe-type" class="advance-selectable" required>
                            <?php if ($_smarty_tpl->tpl_vars['categorie']->value != null) {?>
                                <?php if (is_array($_smarty_tpl->tpl_vars['categorie']->value)) {?>
                                    <?php
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);
$_smarty_tpl->tpl_vars['i']->value = 0;
if ($_smarty_tpl->tpl_vars['i']->value < sizeof($_smarty_tpl->tpl_vars['categorie']->value)) {
for ($_foo=true;$_smarty_tpl->tpl_vars['i']->value < sizeof($_smarty_tpl->tpl_vars['categorie']->value); $_smarty_tpl->tpl_vars['i']->value++) {
?>
                                        <option value="<?php echo $_smarty_tpl->tpl_vars['categorie']->value[$_smarty_tpl->tpl_vars['i']->value]->getCategoria();?>
"><?php echo $_smarty_tpl->tpl_vars['categorie']->value[$_smarty_tpl->tpl_vars['i']->value]->getCategoria();?>
</option>
                                    <?php }
}
?>
                                <?php } else { ?>
                                    <option value="<?php echo $_smarty_tpl->tpl_vars['categorie']->value->getCategoria();?>
"><?php echo $_smarty_tpl->tpl_vars['categorie']->value->getCategoria();?>
</option>
                                <?php }?>
                            <?php }?>
                            </select>
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="recipe-submit-btn">Pubblica la tua domanda</button>
                    </div>
                </form>
            </div>
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
