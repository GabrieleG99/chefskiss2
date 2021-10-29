<?php

class CContact
{
    static function contattaci(){
        $view = new VContact();
        $session = USingleton::getInstance('USession');
        $utente = unserialize($session->readValue('utente'));
        if ($utente != null) {
            $view->contact();
        } else {
            header('Location: /chefskiss/Utente/login');
        }

    }

    static function mail(){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $message = $_POST['message'];
        $formcontent="From: $name \n Message: $message";
        $recipient = "loris.lindozzi@gmail.com";
        $subject = "Contact Form";
        $mailheader = "From: $email \r\n";
        mail($recipient, $subject, $formcontent, $mailheader) or die("Error!");
        echo "Thank You!";
    }




}