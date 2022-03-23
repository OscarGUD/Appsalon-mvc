<?php

namespace Classes;
use PHPMailer\PHPMailer\PHPMailer;

use Dotenv\Dotenv as Dotenv;
$dotenv = Dotenv::createImmutable('../includes/.env');
$dotenv->safeLoad();

class Email{

    public $email;
    public $nombre;
    public $token;

    public function __construct($email, $nombre, $token)
    {
        $this->email = $email;
        $this->nombre = $nombre;
        $this->token = $token;
    }

    public function enviarConfirmacion(){
        // Crear el objeto email
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = $_ENV['MAIL_HOST'];
        $mail->SMTPAuth = true;
        $mail->Port = $_ENV['MAIL_PORT'];
        $mail->SMTPSecure = 'tls';
        $mail->Username = $_ENV['MAIL_USER'];
        $mail->Password = $_ENV['MAIL_PASS'];

        $mail->setFrom('correodepruebasphpmailer@gmail.com');
        $mail->addAddress('akilesnoob@gmail.com');
        $mail->Subject = 'Confirma tu cuenta';

        $mail->isHTML(true);
        $mail->Charser = 'UTF-8';
        $contenido = '<html>';
        $contenido .= '<p><strong>Hola ' . $this->nombre . '</strong> Has creado tu cuenta en App salon, solo debes confirmarla presionando el siguiente enlace</p>';
        $contenido .= '<p>Preciona Aqui: <a href="https://lit-retreat-56820.herokuapp.com/confirmar-cuenta?token=' . $this->token . '">Confirmar Cuenta</a></p>';
        $contenido .= '<p>Si tu no solicitaste esta cuenta puedes ignorar el mensaje</p>';
        $contenido .= '</html>';

        $mail->Body = $contenido;
        // Enviar email
        $mail->send();
    }

    public function enviarInstrucciones(){
        // Crear el objeto email
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = $_ENV['MAIL_HOST'];
        $mail->SMTPAuth = true;
        $mail->Port = $_ENV['MAIL_PORT'];
        $mail->SMTPSecure = 'tls';
        $mail->Username = $_ENV['MAIL_USER'];
        $mail->Password = $_ENV['MAIL_PASS'];

        $mail->setFrom('cuentas@appsalon.com');
        $mail->addAddress('cuentas@appsalon.com', 'Appsalon.com');
        $mail->Subject = 'Reestablece tu password';

        $mail->isHTML(true);
        $mail->Charser = 'UTF-8';
        $contenido = '<html>';
        $contenido .= '<p><strong>Hola ' . $this->nombre . '</strong> Has solicitado el reestablecimiento de tu password en AppSalon, sigue el siguiente enlace</p>';
        $contenido .= '<p>Preciona Aqui: <a href="https://lit-retreat-56820.herokuapp.com/recuperar?token=' . $this->token . '">Reestablecer Tu Password</a></p>';
        $contenido .= '<p>Si tu no solicitaste esta cuenta puedes ignorar el mensaje</p>';
        $contenido .= '</html>';

        $mail->Body = $contenido;
        // Enviar email
        $mail->send();
    }
}