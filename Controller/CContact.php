<?php

class CContact
{
    static function contattaci()
    {
        $view = new VContact();

    }

    static function mail()
    {
        $name = VContact::getName();
        $email = VContact::getEmail();
        $message = VContact::getMessage();
        $formcontent = "From: $name \nEmail: $email \nMessage: $message";
        $recipient = "loris.lindozzi@gmail.com";
        $subject = "Contact Form";
        mail($recipient, $subject, $formcontent, $email);
        header("Location: /chefskiss/Contact/contattaci");


    }


}