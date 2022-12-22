<?php
require "dbconnect.php";
$file = fopen($_FILES['img']['tmp_name'], 'r+');
var_dump($file);
if ($file = fopen($_FILES['img']['tmp_name'], 'r+')){
    //получение расширения
    $ext = explode('.', $_FILES["img"]["name"]);
    $ext = $ext[count($ext) - 1];
    $filename = 'file' . rand(100000, 999999) . '.' . $ext;

    $resource = Container::getFileUploader()->store($file, $filename);


    $picture_url = $resource['ObjectURL'];
}
else
{
    $picture_url = '/assets/calendar.png';
}
try {
    $sql = 'INSERT INTO event(title, start, end, picture_url ) VALUES(:title, :start, :end, :picture_url)';
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':title', $_POST['title']);
    $stmt->bindValue(':start', $_POST['start']);
    $stmt->bindValue(':end', $_POST['end']);
    $stmt->bindValue(':picture_url', $picture_url);
    $stmt->execute();

    $sql = 'INSERT INTO calendar(id_user, id_event) VALUES(:id_user, (SELECT MAX(`id`) FROM event))';
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':id_user', $_SESSION['id']);
    $stmt->execute();

    echo ("Категория успешно добавлена");
    // return generated id
    // $id = $pdo->lastInsertId('id');

} catch (PDOexception $error) {
    echo ("Ошибка добавления категории: " . $error->getMessage());
}
// перенаправление на главную страницу приложения
header('Location: http://609-91webprogramkd');
exit( );