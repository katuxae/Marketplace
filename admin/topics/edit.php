<?php

include '/OSPanel/domains/marplct/path.php';
include '/OSPanel/domains/marplct/app/controllers/topics.php';
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
                <a href="/admin/topics/create.php" class="col-3 btn btn-success">Add topics</a>
                <span class="col-1"></span>
                <a href="/admin/topics/index.php" class="col-3 btn btn-warning">Edit topics</a>
            </div>
            <div class="row title-table">
                <h2>Обновление категории</h2>
            </div>
            <div class="col-9 err">
                <p><?= $errMsg ?></p>
            </div>
            <div class="row add-product">
                <form action="edit.php" method="post" enctype="multipart/form-data">
                    <input name="id" value="<?= $id; ?>" type="hidden">
                    <div class="col mb-4">
                        <input name="name" value="<?= $name; ?>" type="text" class="form-control" placeholder="Название категории" aria-label="Название категории">
                    </div>
                    <div class="col">
                        <label for="editor" class="form-label">Описание категории</label>
                        <textarea name="description" id="editor" class="form-control" rows="3"><?= $description; ?></textarea>

                    </div>
                    <div class="input-group">
                        <input type="file" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                        <button class="btn btn-outline-secondary" type="button" id="inputGroupFileAddon04">Загрузить</button>
                    </div>
                    <div class="col col-6">
                        <button name="topic-edit" class="btn btn-primary" type="submit">Обновить категорию</button>
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