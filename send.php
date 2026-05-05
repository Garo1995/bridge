<?php
// send.php
// Настройки
$to = "M.O.C.T@yandex.ru";
$mail_from = "no-reply@yourdomain.com"; // ОБЯЗАТЕЛЬНО доменная почта вашего сайта

// Получаем POST безопасно
$name = isset($_POST['name']) ? trim($_POST['name']) : '';
$email = isset($_POST['email']) ? trim($_POST['email']) : '';
$user_subject = isset($_POST['subject']) ? trim($_POST['subject']) : '';
$message = isset($_POST['message']) ? trim($_POST['message']) : '';

// Серверная валидация
$errors = [];

// Имя: разрешаем буквы, пробелы, дефисы, 2-60 символов
if ($name === '' || !preg_match("/^[\p{L}\s'-]{2,60}$/u", $name)) {
    $errors[] = "Неверное имя. Используйте 2-60 буквенных символов.";
}

// Email: используем встроенную проверку
if ($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Неверный email.";
}

if (!empty($errors)) {
    // Возвращаем ошибку (можно JSON при AJAX)
    header('Content-Type: text/plain; charset=utf-8');
    echo "Ошибка валидации:\n" . implode("\n", $errors);
    exit;
}

// Защита от header injection: удаляем CRLF из полей, используемых в заголовках
$clean_email = str_replace(["\r", "\n"], '', $email);
$clean_name = str_replace(["\r", "\n"], '', $name);

// Подготовка письма
$subject = "Новая заявка с сайта";
$body  = "Имя: " . htmlspecialchars($name, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') . "\n";
$body .= "Email: " . htmlspecialchars($email, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') . "\n";
$body .= "Тема: " . htmlspecialchars($user_subject, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') . "\n\n";
$body .= "Сообщение:\n" . htmlspecialchars($message, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') . "\n";

// Ограничение ширины строки для mail()
$body = wordwrap($body, 998);

// Заголовки - используем доменную почту в From
$headers = "From: " . $mail_from . "\r\n";
$headers .= "Reply-To: " . $clean_email . "\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

// Отправка
$success = mail($to, $subject, $body, $headers);

if ($success) {
    header('Content-Type: text/plain; charset=utf-8');
    echo "Отправлено";
} else {
    header('Content-Type: text/plain; charset=utf-8');
    echo "Ошибка при отправке. Свяжитесь с администратором.";
}
?>
