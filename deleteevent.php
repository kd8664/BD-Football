<?php
require "dbconnect.php";
$id_event = $_GET['id_event'];
try {
    $result = $conn->query("SELECT * FROM event WHERE event.id=".$id_event);
    $row = $result->fetch();
    try {
        $resource = Container::getFileUploader()->delete($row['picture_url']);
    } catch (S3Exception $e) {
        $_SESSION['msg'] = $e->getMessage();
    }
    $sql = 'DELETE FROM calendar WHERE calendar.id_user=:id_user AND calendar.id_event=:id_event';
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':id_event', $id_event);
    $stmt->bindValue(':id_user', $_SESSION['id']);
    $stmt->execute();
    $sql = 'DELETE FROM event WHERE id=:id';
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':id', $id_event);
    $stmt->execute();
    //echo ("Категория успешно удалена");
    // return generated id
    // $id = $pdo->lastInsertId('id');
} catch (PDOexception $error) {
    echo ("Ошибка удаления категории: " . $error->getMessage());
}
// перенаправление на главную страницу приложения
header('Location: http://609-91webprogramkd');
exit( );