<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
class Mail
{
    public static function senMail($body)
    {
        $Mail = new PHPMailer();
        $Mail->isSMTP();
        $Mail->SMTPAuth = true;
        $Mail->SMTPSecure = "tls";
        $Mail->Host = 'smtp.gmail.com';
        $Mail->port = '587';
        $Mail->isHTML();
        $Mail->Username = "robot.cameleon.shop@gmail.com";
        $Mail->Password = "mybot4000";
        $Mail->setFrom("robot.cameleon.shop@gmail.com");
        $Mail->Subject = "Commentaire";
        $Mail->Body = $body;
        $Mail->addAddress("cameleonshop.contact@gmail.com");

        $Mail->Send();


    }
}
