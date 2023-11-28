<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Получаем данные из формы
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $message = $_POST["message"];

    // Проверяем, что все обязательные поля заполнены
    if (!empty($name) && !empty($email) && !empty($phone)) {
        // Ваш адрес электронной почты, на который будут отправлены данные
        $to = "MixBrend392@gmail.com";

        // Тема письма
        $subject = "Новая заявка с формы";

        // Сообщение
        $message = "Имя: $name\n";
        $message .= "Email: $email\n";
        $message .= "Телефон: $phone\n";
        $message .= "Сообщение: $message\n";

        // Заголовки
        $headers = "From: $email" . "\r\n" .
                   "Reply-To: $email" . "\r\n" .
                   "X-Mailer: PHP/" . phpversion();

        // Отправка письма
        $success = mail($to, $subject, $message, $headers);

        if ($success) {
            echo json_encode(["message" => "Данные успешно отправлены!"]);
        } else {
            echo json_encode(["message" => "Ошибка при отправке данных. Пожалуйста, попробуйте еще раз."]);
        }
    } else {
        echo json_encode(["message" => "Пожалуйста, заполните все обязательные поля."]);
    }
} else {
    header("Location: index.html"); // Перенаправление на главную страницу, если запрос не является POST
}
?>
