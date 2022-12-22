<?php
require "dbconnect.php";
require "auth.php";
require "menu.php";
?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
    <title>Админ-панель</title>
    <style>

    .card {
        border: 1px solid #4285F4;
        border-radius: 5px;
    }

    .btn {
        justify-content: center;
        background-color: #4285F4;
        font-size: 18px;
        color: white;
    }

    .btn:hover {
        background-color: #1259b0;
        color: white;
    }
    </style>
</head>

<body >
    <div class="container pt-5">
        <h2 class="text-center mt-5">Создание матча</h2>
        <a href="/matches.php">На главную</a>
        <form class="needs-validation" action="insertMatch.php" method="POST">
                    <div class="card mb-4 mt-3 shadow-sm">
                        <div class="card-body">
                            <div class="col">
                                <div class="row">
                                    <div class="col mb-3">
                                        <h5 for="exampleFormControlTextarea1" class="form-label">Название 1 команды
                                        </h5>
                                        <input type="varchar" class="form-control" name="Name1" id="Name1">
                                    </div>
                                </div>
                                <hr class="mb-4">
                                <div class="row">
                                    <div class="col mb-3">
                                        <h5 for="exampleFormControlTextarea1" class="form-label">Название 2 команды
                                        </h5>
                                        <input type="varchar" class="form-control" name="Name2" id="Name2">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-secondary btn-lg btn-block" type="submit">Добавить матч</button>
        </form>
    </div>
</body>

</html>