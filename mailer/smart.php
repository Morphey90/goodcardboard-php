<?php

$phone = $_POST['user_phone'];

require_once('phpmailer/PHPMailerAutoload.php');
$mail = new PHPMailer;
$mail->CharSet = 'utf-8';

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
//$mail->Host = 'mail.host.';  // Specify main and backup SMTP servers
$mail->Host = 'smtp.mail';
$mail->SMTPAuth = true;                               // Enable SMTP authentication
//$mail->Username = 'username';                 // Наш логин
//$mail->Password = 'pass';                           // Наш пароль от ящика
$mail->Username = 'email@mail';
$mail->Password = 'Pass';
$mail->SMTPSecure = 'ssl';                  // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465;                                    // TCP port to connect to

$mail->setFrom('email@mail', 'Robot from Cardboard');   // from
$mail->addAddress('Pass');     // Add a recipient
//$mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');
//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Тестововая отправка формы с сайта Добрый картон';
$mail->Body    = '
	Пользователь оставил свои данные 
	Телефон: ' . $phone . '';
$mail->AltBody = 'Это альтернативный текст если html не работает на сервере';

if (!$mail->send()) {
	return false;
	//echo 'Ошибка! К сожалению, что-то пошло не так и письмо не было отправлено.';
	//echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
	return true;
	//header(location: "../thanks.html");
}
