<?php
if(isset($_GET['logout']))
{
    setcookie("name","kir",time()-999999);
}
if(isset($_GET['login'])){
    setcookie("name",$_GET['login'],time()+15000);
}
if (isset($_COOKIE['name']))
{
    echo ('Привет, '.$_COOKIE['name'].'!');
    echo ('<a href=cookie.php?logout=1>Выйти из системы<a>');
}
else{
    echo ('<a href=cookie.php?login=kir>Войти<a>');
}