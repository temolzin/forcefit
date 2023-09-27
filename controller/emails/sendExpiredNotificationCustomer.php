<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


class sendExpiredNotificationCustomer
{
    public function sendEmailToCustomer($cliente, $name_gym)
    {
        require 'vendor/autoload.php';

        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'cruzrosasjesus@gmail.com';
            $mail->Password   = 'vwbv jbgm iebb ksox';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port       = 465;

            $mail->setFrom('cruzrosasjesus@gmail.com', 'Jesus');
            $mail->addAddress('' . $cliente->email_customer . '', 'Sr Yisus');
            $imagePath = __DIR__ . '/../../public/gimnasio/' . $cliente->imagen_cliente;
            $imagePath2 = __DIR__ . '/../../public/img/logos/logotipoAzul.png';
            $mail->addEmbeddedImage($imagePath, 'gym.png');
            $mail->addEmbeddedImage($imagePath2, 'rootheim.png');

            $mail->isHTML(true);
            $mail->CharSet = 'UTF-8';
            $mail->Subject = 'Recordatorio de Caducidad de Membresía';
            $mail->Body = '
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Recordatorio de Caducidad de Membresía</title>
                <style>
                    body {
                        font-family: Arial, sans-serif;
                        background-color: #f2f2f2;
                        color: #000;
                        margin: 0;
                        padding: 0;
                        text-align: center;
                    }

                    .container {
                        max-width: 600px;
                        margin: 0 auto;
                        padding: 20px;
                        background-color: #fff;
                        color: #000;
                        border-radius: 10px;
                        border: 3px solid #ccc;
                    }

                    .header {
                        background-color: #60CFF5;
                        padding: 20px;
                        border-top-left-radius: 10px;
                        border-top-right-radius: 10px;
                    }

                    .header h1 {
                        color: #fff;
                        margin: 0;
                        text-align: center;
                    }

                    .line {
                        background-color: #3498db;
                        height: 2px;
                        margin: 20px auto;
                        width: 50%;
                    }

                    .content {
                        text-align: left;
                    }

                    .content h2 {
                        margin-top: 20px;
                    }

                    .content p {
                        margin-bottom: 20px;
                        text-align: justify;
                    }

                    .content ul {
                        list-style: none;
                        padding: 0;
                    }

                    .content li:before {
                        content: "•";
                        color: #3498db;
                        margin-right: 10px;
                    }

                    .footer {
                        color: #000;
                        display: flex;
                        justify-content: center;
                        align-items: center;
                        padding: 10px 20px;
                        border-bottom-left-radius: 10px;
                        border-bottom-right-radius: 10px;
                    }

                    .logo-top {
                        max-width: 8%;
                    }

                    .logo-bottom {
                        max-width: 6%;
                    }

                    .centered-text {
                        text-align: center;
                    }

                    .footer-text {
                        margin-left: 10px;
                    }

                    a {
                        color: #000; /* Cambia el color a negro (#000) o el color deseado */
                        text-decoration: none; /* Elimina el subrayado predeterminado de los enlaces */
                    }
                </style>
            </head>
            <body>
                <div class="container">
                    <div class="header">
                        <h1 style="text-align: center;">Recordatorio de Caducidad de Membresía</h1>
                    </div>
                    <div class="line"></div>
                    <div class="content">
                        <h2>Suscripción por expirar</h2>
                        <p>Estimado(a) cliente <strong>' . $cliente->nombre_cliente . '</strong></p>
                        <p style="text-align: justify;">Le recordamos que su membresía en <strong>' . $name_gym . '</strong> está
                            programada para caducar el día ' . $cliente->fecha_vencimiento . '. A continuación, encontrará algunos
                            detalles importantes:</p>
                        <ul>
                            <li style="text-align: justify;">Fecha de Caducidad de Membresía: <strong>' .
                                    $cliente->fecha_vencimiento . '</strong></li>
                            <li style="text-align: justify;">Tipo de Membresía: <strong>' . $cliente->nombrePlanGym . '</strong>
                            </li>
                        </ul>
                        <p style="text-align: justify;">Para renovar su membresía y continuar disfrutando de nuestros servicios, le
                            invitamos a visitarnos en nuestro gimnasio. Nuestro personal estará disponible para ayudarle con la
                            renovación y responder a cualquier pregunta que pueda tener. Estamos aquí para proporcionarle la mejor
                            asistencia posible.</p>
                        <p style="text-align: justify;">¡Esperamos seguir viéndole en nuestro gimnasio y ayudarle a alcanzar sus
                            objetivos de fitness!</p>
                    </div>
                    <div class="footer">
                        <img src="cid:gym.png" alt="Logo al final" class="logo-bottom">
                        <p class="footer-text">&copy; ' . $name_gym . '. Todos los derechos reservados.</p>
                    </div>
                    <div class="footer">
                        <img src="cid:rootheim.png" alt="Logo al final" class="logo-top">
                        <p class="footer-text"><a href="https://www.rootheim.com/" style="color: #000; text-decoration: none;">Force Fit by Root Heim Company</a></p>
                    </div>
                </div>
            </body>
            </html>
            ';
            $mail->send();
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}
