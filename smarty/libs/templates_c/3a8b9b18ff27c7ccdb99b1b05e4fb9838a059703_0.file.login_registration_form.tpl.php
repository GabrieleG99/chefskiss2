<?php
/* Smarty version 3.1.39, created on 2021-11-22 17:09:00
  from 'C:\xampp\htdocs\chefskiss\smarty\libs\templates\login_registration_form.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_619bc09c93eef3_80592569',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3a8b9b18ff27c7ccdb99b1b05e4fb9838a059703' => 
    array (
      0 => 'C:\\xampp\\htdocs\\chefskiss\\smarty\\libs\\templates\\login_registration_form.tpl',
      1 => 1637167714,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_619bc09c93eef3_80592569 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<?php $_smarty_tpl->_assignInScope('ban', (($tmp = @$_smarty_tpl->tpl_vars['ban']->value)===null||$tmp==='' ? 0 : $tmp));
$_smarty_tpl->_assignInScope('error', (($tmp = @$_smarty_tpl->tpl_vars['error']->value)===null||$tmp==='' ? '' : $tmp));
$_smarty_tpl->_assignInScope('fine_ban', (($tmp = @$_smarty_tpl->tpl_vars['fine_ban']->value)===null||$tmp==='' ? '' : $tmp));?>
<!-- Coding by CodingLab | www.youtube.com/codinglabyt -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> Login and Registration Form in HTML & CSS | CodingLab </title>
    <link rel="stylesheet" href="../smarty/libs/css/styles.css">
    <!-- Fontawesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <div class="container">
    <input type="checkbox" id="flip">
    <div class="cover">
      <div class="front">
        <img src="../smarty/libs/assets/ThomasKeller828x1344.jpg" alt="">
        <div class="text">
          <span class="text-1">Accedi a un mondo di<br> nuove ricette</span>
        </div>
      </div>
      <div class="back">
        <img class="backImg" src="../smarty/libs/assets/ThomasKeller.jpg" alt="">
        <div class="text">

        </div>
      </div>
    </div>
    <div class="forms">
        <div class="form-content">
          <div class="login-form">
            <div class="title">Login</div>
          <form action="/chefskiss/Utente/login" method="POST">
            <div class="input-boxes">
              <div class="input-box">
                <i class="fas fa-envelope"></i>
                <input type="text" placeholder="Enter your email" name="email" required>
              </div>
              <div class="input-box">
                <i class="fas fa-lock"></i>
                <input type="password" placeholder="Enter your password" name="password" required>
              </div>
              <div class="text"><a href="#">Forgot password?</a></div>
              <div class="button input-box">
                <input type="submit" value="Submit">
              </div>
              <div class="text sign-up-text">Don't have an account? <label for="flip">Sigup now</label></div>
            </div>
        </form>
      </div>
        <div class="signup-form">
          <div class="title">Signup</div>
        <form action="/chefskiss/Utente/registrazione" method="POST">
            <div class="input-boxes">
              <div class="input-box">
                <i class="fas fa-user"></i>
                <input type="text" placeholder="Enter your name" name="name" required>
              </div>
              <div class="input-box">
                <i class="fas fa-user"></i>
                <input type="text" placeholder="Enter your surname" name="username" required>
              </div>
              <div class="input-box">
                <i class="fas fa-envelope"></i>
                <input type="text" placeholder="Enter your email" name="email" required>
              </div>
              <div class="input-box">
                <i class="fas fa-lock"></i>
                <input type="password" placeholder="Enter your password" name="password" required>
              </div>
              <div class="button input-box">
                <input type="submit" value="Submit">
              </div>
              <div class="text sign-up-text">Already have an account? <label for="flip">Login now</label></div>
            </div>
      </form>
    </div>
    </div>
    </div>
  </div>
  <?php if ($_smarty_tpl->tpl_vars['ban']->value == 1 && $_smarty_tpl->tpl_vars['fine_ban']->value != '') {?>
    <?php echo '<script'; ?>
>alert("Sei stato bannato fino al <?php echo $_smarty_tpl->tpl_vars['fine_ban']->value;?>
")<?php echo '</script'; ?>
>
  <?php }?>

  <?php if ($_smarty_tpl->tpl_vars['error']->value == 'errore') {?>
    <?php echo '<script'; ?>
>alert("Riprova l'accesso")<?php echo '</script'; ?>
>
  <?php }?>
</body>
</html>
<?php }
}
