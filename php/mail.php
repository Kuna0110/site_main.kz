<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once('PHPMailer-master/src/PHPMailer.php');
require_once('PHPMailer-master/src/Exception.php');
require_once('PHPMailer-master/src/SMTP.php');

$mail = new PHPMailer;
$mail->CharSet = 'utf-8';
$mail->setLanguage('ru', 'PHPMailer-master/language/');
$mail->IsHTML(true);

$email = $_POST['email'];
$name = $_POST['name'];
$phone = $_POST['phone'];
$message = $_POST['message'];

//$mail->SMTPDebug = 3;
$mail->isSMTP();
$mail->Host = 'smtp.mail.ru';
$mail->SMTPAuth = true;
$mail->Username = ''; // Ваш логин от почты с которой будут отправляться письма
$mail->Password = ''; // Ваш пароль от почты с которой будут отправляться письма
$mail->SMTPSecure = 'ssl';
$mail->Port = 465; // TCP port to connect to / этот порт может отличаться у других провайдеров

$mail->setFrom('wayzard.90@mail.ru'); // от кого будет уходить письмо?
$mail->addAddress('wayzard.90@mail.ru'); // Кому будет уходить письмо

//Настройка заголовка и тела письма
$mail->Subject = 'Обратная связь с сайта www.kz';
$mail->Body    = '
                    <html>
                        <head>
                            <title></title>
                        </head>
                        <body>
                            <p><b>Почта:</b> '.$email.'</p>
                            <p><b>Имя:</b> '.$name.'</p>
                            <p><b>Телефон:</b> '.$phone.'</p>
                            <p><b>Сообщение:</b> '.$message.'</p>
                        </body>
                    </html>';
$mail->AltBody = '';

if(!$mail->send()) {
    echo 'Ошибка, запрос не отправлен!';
} else {
    echo 'Ваше письмо отправленно.';
}

?>
