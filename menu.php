<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <div class="container-fluid">
        <img class="navbar-brand" src="assets/cup.png" width="60" height="60"></img>
        <h3 class="" style="color:white">Football Cup
        </h3>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav me-auto mb-2 mb-md-0">

            </ul>
<?php

if (!isset($_SESSION['login'])) {
    echo "<form method='post'>";
    echo '<input style="border-radius:5px;padding:5px" class="col-form-control me-2" type="text" placeholder="Логин" name="login" aria-label="Логин"/>';
    echo '<input style="border-radius:5px;padding:5px" class="col-form-control me-2" type="text" placeholder="Пароль" name="password" aria-label="Пароль"/>';
    echo '<button class="btn btn-outline-success" type="submit">Войти</button>';
    echo "</form>";
} else {
    echo "<a class='backk' style='color:white'>Привет, " . $_SESSION['name'] . ' ' . $_SESSION['surname'] ;
    echo "<a class='backk' style='margin-left:15px;color:white' href='?logout=1'>Выйти из системы</a>";
}
?>
        </div>
    </div>
</nav>
</body>
