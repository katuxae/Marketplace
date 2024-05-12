<?php
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

        <div class="products col-10">
            <div class="button row">
                <a href="/admin/products/create.php" class="col-3 btn btn-success">Add product</a>
                <span class="col-1"></span>
                <a href="/admin/products/index.php" class="col-3 btn btn-warning">Edit product</a>
            </div>
            <div class="row title-table col-14">
                <h2>Управление товарами</h2>
                <div class="col-1" style="width: 5%;">ID</div>
                <div class="col-2">Название</div>
                <div class="col-1">Кол-во</div>
                <div class="col-1">Цена</div>
                <div class="col-3">Продавец</div>
                <div class="col-2">Категория</div>
                <div class="col-2" style="width: 20%;">Управление</div>
            </div>
            <?php foreach ($productsAdm as $key => $products) : ?>
                <div class="row product">
                    <div class="id col-1" style="width: 5%;"><?= $key + 1; ?></div>
                    <div class="name col-2"><?= $products['namep']; ?></div>
                    <div class="count col-1"><?= $products['count']; ?></div>
                    <div class="price col-1"><?= $products['price']; ?></div>
                    <div class="id_user col-3"><?= $products['email']; ?></div>
                    <div class="topic col-1"><?= $products['namet']; ?></div>
                    <div class="red col-2" style="width: 8%;"><a href="edit.php?id=<?= $products['id']; ?>">edit</a></div>
                    <div class="del col-2" style="width: 8%;"><a href="edit.php?del_id=<?= $products['id']; ?>">delete</a></div>
                    <?php if ($products['status']) : ?>
                        <div class="status col-1"><a href="">draft</a></div>
                    <?php else : ?>
                        <div class="status col-1"><a href="">done</a></div>
                    <?php endif ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>




    <?php include '/OSPanel/domains/marplct/app/include/footer.php'; ?>
    <!--footer end-->

</body>

</html>