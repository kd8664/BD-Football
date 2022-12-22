<?php
require "dbconnect.php";
$id = $_GET['id'];
try {
    $sql = 'DELETE FROM Game WHERE Game.id=:id';
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':id', $id);
    $stmt->execute();
    //echo ("Категория успешно удалена");
    // return generated id
    // $id = $pdo->lastInsertId('id');
} catch (PDOexception $error) {
    echo ("Ошибка удаления категории: " . $error->getMessage());
}
// перенаправление на главную страницу приложения
header('Location: http://footballcup');
exit( );