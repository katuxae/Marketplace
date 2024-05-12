<?php
include '/OSPanel/domains/marplct/app/database/session.php';
include '/OSPanel/domains/marplct/path.php';

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Marketplace</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/09c228de17.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="/assets/css/admin.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300..700&family=Montserrat+Alternates&display=swap" rel="stylesheet">
</head>

<body>

    <?php include '/OSPanel/domains/marplct/app/include/header-admin.php'; ?>

    <div class="container">
        <?php include '/OSPanel/domains/marplct/app/include/sidebar-admin.php'; ?>

        <div class="products col-9">
            <div class="button row">
                <a href="/admin/users/create.php" class="col-3 btn btn-success">Add</a>
                <span class="col-1"></span>
                <a href="/admin/users/index.php" class="col-3 btn btn-warning">Edit</a>
            </div>
            <div class="row title-table">
                <h2>Добавление пользователя</h2>

            </div>
            <div class="row add-product">
                <form action="create.php" method="post" enctype="multipart/form-data">
                    <div class="col">
                        <label for="formGroupExampleInput" class="form-label">Ваше имя</label>
                        <input type="text" name="name" value="<?= $name ?>" class="form-control" id="formGroupExampleInput" placeholder="Введите ваше имя">
                    </div>

                    <div class="col">
                        <label for="formGroupExampleInput" class="form-label">Логин</label>
                        <input type="text" name="login" value="<?= $login ?>" class="form-control" id="formGroupExampleInput" placeholder="Введите ваш логин">
                    </div>

                    <div class="col">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" name="email" value="<?= $email ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

                    </div>

                    <div class="col">
                        <label for="exampleInputPassword1" class="form-label">Пароль</label>
                        <input type="password" name="password1" class="form-control" id="exampleInputPassword1" placeholder="Введите ваш пароль">
                    </div>

                    <div class="col">
                        <label for="exampleInputPassword1" class="form-label">Повтор пароля</label>
                        <input type="password" name="password2" class="form-control" id="exampleInputPassword2" placeholder="Повторите ваш пароль">
                    </div>
                    <select class="form-select" aria-label="Default select example">
                        <option selected>Выбрать роль</option>
                        <option value="1">is_moder</option>
                        <option value="2">is_seller</option>
                        <option value="3">is_buyer</option>
                        <option value="3">is_manager</option>
                    </select>
                    <div class="col col-6">
                        <button name="add_post" class="btn btn-primary" type="submit">Добавить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    </div>



    <?php include '/OSPanel/domains/marplct/app/include/footer.php'; ?>
    <!--footer end-->

</body>

</html>