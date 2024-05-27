<?php
// Подключение к базе данных
require_once 'db.php'; // Подключаем файл с настройками подключения

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $orderId = $_POST['order_id'];
    $status = $_POST['status'];

    try {
        // Подготовка и выполнение запроса на обновление состояния заказа
        $stmt = $pdo->prepare("UPDATE `order` SET `status` = ? WHERE `id` = ?");
        $stmt->execute([$status, $orderId]);

        // Перенаправление обратно на страницу заказов после обновления
        header('Location: /admin/admin-order.php');
        exit;
    } catch (PDOException $e) {
        // Обработка ошибок обновления
        echo "Ошибка: " . $e->getMessage();
    }
}
?>
