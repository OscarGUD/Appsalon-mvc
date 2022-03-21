<?php

namespace Classes;
use PHPMailer\PHPMailer\PHPMailer;

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
        $mail->Host = 'smtp.mailtrap.io';
        $mail->SMTPAuth = true;
        $mail->Port = 2525;
        $mail->Username = '7b9690fae90050';
        $mail->Password = '829942c44ce128';

        $mail->setFrom('cuentas@appsalon.com');
        $mail->addAddress('cuentas@appsalon.com', 'Appsalon.com');
        $mail->Subject = 'Confirma tu cuenta';

        $mail->isHTML(true);
        $mail->Charser = 'UTF-8';
        $contenido = '<html>';
        $contenido .= '<p><strong>Hola ' . $this->nombre . '</strong> Has creado tu cuenta en App salon, solo debes confirmarla presionando el siguiente enlace</p>';
        $contenido .=  '<p>Preciona Aqui: <a href="http://localhost:3000/confirmar-cuenta?token=' . $this->token . '">Confirmar Cuenta</a></p>';
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
        $mail->Host = 'smtp.mailtrap.io';
        $mail->SMTPAuth = true;
        $mail->Port = 2525;
        $mail->Username = '7b9690fae90050';
        $mail->Password = '829942c44ce128';

        $mail->setFrom('cuentas@appsalon.com');
        $mail->addAddress('cuentas@appsalon.com', 'Appsalon.com');
        $mail->Subject = 'Reestablece tu password';

        $mail->isHTML(true);
        $mail->Charser = 'UTF-8';
        $contenido = '<html>';
        $contenido .= '<p><strong>Hola ' . $this->nombre . '</strong> Has solicitado el reestablecimiento de tu password en AppSalon, sigue el siguiente enlace</p>';
        $contenido .=  '<p>Preciona Aqui: <a href="http://localhost:3000/recuperar?token=' . $this->token . '">Reestablecer Tu Password</a></p>';
        $contenido .= '<p>Si tu no solicitaste esta cuenta puedes ignorar el mensaje</p>';
        $contenido .= '</html>';

        $mail->Body = $contenido;
        // Enviar email
        $mail->send();
    }
}