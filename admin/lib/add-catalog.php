<?php
// Включаем отображение ошибок для отладки
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Подключаем файл с настройками базы данных
require "db.php";

// Проверяем, что данные были отправлены
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Получаем название категории
    $title = $_POST['title'];
    
    // Проверяем и загружаем изображение
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        // Путь для сохранения изображения
        $uploadDir = '../../images/catalog';
        $uploadFile = $uploadDir . basename($_FILES['image']['name']);
        
        // Перемещаем загруженный файл в нужную директорию
        if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadFile)) {
            $image = $uploadFile;
        } else {
            echo "Ошибка загрузки изображения.";
            exit;
        }
    } else {
        $image = ''; // Путь к изображению по умолчанию, если файл не загружен
    }
    
    // SQL-запрос для вставки данных
    $sql = 'INSERT INTO category (title, image) VALUES (?, ?)';
    $query = $pdo->prepare($sql);
    $query->execute([$title, $image]);
    
    // Перенаправляем на страницу управления каталогами
    header('Location: /admin/manage-catalog.php');
    exit;
}
?>
