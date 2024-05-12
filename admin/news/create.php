<?php
include '/OSPanel/domains/marplct/path.php';
include '/OSPanel/domains/marplct/app/controllers/news.php';


?>

<!doctype html>
<html lang="ru">

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
                <a href="/admin/news/create.php" class="col-3 btn btn-success">Add</a>
                <span class="col-1"></span>
                <a href="/admin/news/index.php" class="col-3 btn btn-warning">Edit</a>
            </div>
            <div class="row title-table">
                <h2>Добавление новости</h2>
            </div>
            <div class="row add-news">
                <form action="create.php" method="post" enctype="multipart/form-data">
                    <div class="col mb-4">
                        <input name="title" type="text" class="form-control" placeholder="Title" aria-label="Название новости">
                    </div>
                    <div class="col">
                        <label for="editor" class="form-label">Описание</label>
                        <textarea name="content" id="editor" class="form-control" rows="10"></textarea>
                    </div>

                    <div class="input-group mb-2 mt-2">
                        <input name="img" type="file" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                        <button class="btn btn-outline-secondary" type="button" id="inputGroupFileAddon04">Загрузить</button>
                    </div>
                    <select name="topic" class="form-select mb-2" aria-label="Default select example">
                        <option selected>Выбрать категорию</option>

                        <?php foreach ($topics as $key => $topic) : ?>
                            <option value="<?= $topic['id'] ?>"><?= $topic['name'] ?></option>
                        <?php endforeach; ?>
                    </select>
                    <div class="col col-6">
                        <input type="checkbox" name="done" value="1">
                        <label>Publish</label>
                    </div>
                    <div class="col col-6">
                        <button name="add_news" class="btn btn-primary" type="submit">Добавить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>





    <?php include '/OSPanel/domains/marplct/app/include/footer.php'; ?>
    <!--footer end-->

    <script src="https://cdn.ckeditor.com/ckeditor5/27.0.0/classic/ckeditor.js"></script>
    <script src="/assets/js/script.js"></script>
</body>

</html>