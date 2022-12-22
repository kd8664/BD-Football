<?php

//   $err_msg = '';

if (isset($_POST["login"]) and $_POST["login"] != '') {
    try {
        $sql = 'SELECT id, name, surname, password FROM user WHERE email=(:login)';
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':login', $_POST['login']);
        $stmt->execute();

    } catch (PDOexception $error) {
        $msg = "Ошибка аутентификации: " . $error->getMessage();
    }
    // если удалось получить строку с паролем из БД
    if ($row = $stmt->fetch(PDO::FETCH_LAZY)) {
        if (($_POST['password']) != $row['password']) $msg = "Неправильный пароль!";
        else {
            // успешная аутентификация
            $_SESSION['login'] = $_POST["login"];
            $_SESSION['name'] = $row['name'];
            $_SESSION['surname'] = $row['surname'];
            $_SESSION['id'] = $row['id'];
            //if ($row['is_teacher']==1) $_SESSION['teacher'] = true;
            $msg = "Вы успешно вошли в систему";
        }
    } else $msg = "Неправильное имя пользователя!";

}

if (isset($_GET["logout"])) {
    session_unset();
    $_SESSION['msg'] = "Вы успешно вышли из системы";
    header('Location: http://609-91webprogramkd');
    exit();
}