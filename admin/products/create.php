<?php
include '/OSPanel/domains/marplct/path.php';
include '/OSPanel/domains/marplct/app/controllers/products.php';
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
                <a href="/admin/products/create.php" class="col-3 btn btn-success">Add product</a>
                <span class="col-1"></span>
                <a href="/admin/products/index.php" class="col-3 btn btn-warning">Edit product</a>
            </div>
            <div class="row title-table">
                <h2>Добавление товара</h2>
            </div>
            <div class="row add-product">
                <form action="create.php" method="post" enctype="multipart/form-data">
                    <div class="col mb-4">
                        <input name="name" value="<?= $name; ?>" type="text" class="form-control" placeholder="Title" aria-label="Название товара">
                    </div>
                    <div class="col">
                        <label for="editor" class="form-label">Характеристики товара</label>
                        <textarea name="parametr" id="editor" class="form-control" rows="10"><?= $parametr; ?></textarea>
                    </div>
                    <div class="input-group mb-3">
                        <input name="count" value="<?= $count; ?>" type="text" class="form-control" placeholder="введите кол-во товара" aria-label="Количество товара">
                    </div>
                    <div class="input-group mb-2 mt-2">
                        <span class="input-group-text">₽</span>
                        <input name="price" value="<?= $price; ?>" type="text" class="form-control">
                    </div>
                    <div class="input-group mb-2">
                        <input name="img" type="file" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                        <button class="btn btn-outline-secondary" type="button" id="inputGroupFileAddon04">Загрузить</button>
                    </div>
                    <select name="topic" class="form-select mb-2" aria-label="Default select example">
                        <option selected>Выбрать категорию</option>
                        <?php foreach ($topics as $key => $topic) : ?>
                            <option value="<?= $topic['id'] ?>"><?= $topic['namet'] ?></option>
                        <?php endforeach; ?>
                    </select>
                    <div class="col col-6">
                        <input type="checkbox" name="done" value="1">
                        <label>Publish</label>
                    </div>
                    <div class="col col-6">
                        <button name="add_product" class="btn btn-primary" type="submit">Добавить товар</button>
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