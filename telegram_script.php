<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $message = $_POST["message"];

    // Ваш токен и ID чата бота
    $botToken = "6711317063:AAE2bujpm1WbuGWD2gXe0VPstEu3kb9KbVs";
    $chatId = "-1002095096411";

    // Формируем текст сообщения
    $text = "Новая заявка с формы:\n\n";
    $text .= "Имя: $name\n";
    $text .= "E-mail: $email\n";
    $text .= "Телефон: $phone\n";
    $text .= "Сообщение: $message";

    // Отправляем запрос к API телеграма
    $apiUrl = "https://api.telegram.org/bot$botToken/sendMessage";
    $params = [
        'chat_id' => $chatId,
        'text' => $text,
    ];

    $ch = curl_init($apiUrl);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $result = curl_exec($ch);
    curl_close($ch);

    // Выводим сообщение об успешной отправке
    if ($result) {
        echo "Сообщение успешно отправлено!";
    } else {
        echo "Произошла ошибка при отправке сообщения.";
    }
}
?>
