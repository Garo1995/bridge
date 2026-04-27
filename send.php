<?php

$to = "info@mostfundation.ru";
$subject = "Новая заявка с сайта";

$name = htmlspecialchars($_POST['name']);
$email = htmlspecialchars($_POST['email']);
$user_subject = htmlspecialchars($_POST['subject']);
$message = htmlspecialchars($_POST['message']);

$text = "Имя: $name\n";
$text .= "Email: $email\n";
$text .= "Тема: $user_subject\n";
$text .= "Сообщение:\n$message";

// ВАЖНО: указываем доменную почту
$headers = "From: no-reply@yourdomain.com\r\n";
$headers .= "Reply-To: $email\r\n";

// отправка
if (mail($to, $subject, $text, $headers)) {
    echo "Отправлено";
} else {
    echo "Ошибка";
}
?>