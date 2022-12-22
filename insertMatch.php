<?php
require "dbconnect.php";
$Name1=$_POST['Name1'];
$Name2=$_POST['Name2'];
$tid1=$conn->query("SELECT Team.id FROM Team WHERE Team.Name = '$Name1'")->fetch(PDO::FETCH_ASSOC);
$tid2=$conn->query("SELECT Team.id FROM Team WHERE Team.Name = '$Name2'")->fetch(PDO::FETCH_ASSOC);
if(is_null($tid1))
{
    echo ("Ошибка! Команда не найдена! ");
}
else if(is_null($tid2))
{
    echo ("Ошибка! Команда не найдена! ");
}
else{
try {
    $sql = 'INSERT INTO Game(id_team1, id_team2) VALUES(:id_team1, :id_team2)';
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':id_team1', $tid1['id']);
    $stmt->bindValue(':id_team2', $tid2['id']);
    $stmt->execute();
    echo ("Матч успешно добавлен");
    // return generated id
    // $id = $pdo->lastInsertId('id');

} catch (PDOexception $error) {
    echo ("Ошибка добавления категории: " . $error->getMessage());
}
}
// перенаправление на главную страницу приложения
header('Location: http://footballcup');
exit( );