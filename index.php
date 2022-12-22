<?php
date_default_timezone_set('Asia/Yekaterinburg');
require "dbconnect.php";
require "auth.php";
require "menu.php";
if (isset($_SESSION['login'])){
    require "matches.php";
}
else{
    echo '<img class="Messi" src="assets/MESSI.jpg" width="100%" height="100%" />';
    //echo 'Войдите в сиситему для просмотра и создания событий';
}
require "msg.php";
$_SESSION['msg'] = '';