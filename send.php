<?php

$to = "info@mostfundation.ru";
$subject = "Новая заявка с сайта";

// получаем данные
$name = $_POST['name'];
$email = $_POST['email'];
$user_subject = $_POST['subject'];
$message = $_POST['message'];

// собираем письмо
$text = "Имя: $name\n";
$text .= "Email: $email\n";
$text .= "Тема: $user_subject\n";
$text .= "Сообщение:\n$message";

// заголовки
$headers = "From: $email";

// отправка
if (mail($to, $subject, $text, $headers)) {
    echo "Отправлено";
} else {
    echo "Ошибка";
}
?>