<?php

include '/OSPanel/domains/marplct/app/controllers/products.php';

$products = selectAllFromProductsWithUserOnItemV('Products', 'User', 'Topics');

?>



<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Marketplace</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/09c228de17.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300..700&family=Montserrat+Alternates&display=swap" rel="stylesheet">
</head>

<body>
    <?php require '/OSPanel/domains/marplct/app/include/header.php'; ?>

    <?php require '/OSPanel/domains/marplct/app/include/sidebar.php'; ?>

    <div class="main-content1">

        <?php foreach ($products as $products) : ?>
            <div class="card1">
                <img src="/assets/img/4.jpg" class="card-img" alt="..." height="180">
                <div class="card-body1">
                    <h5 class="card-title"><?= $products['namep'] ?></h5>
                    <div class="id_topic">Категория: <?= $products['namet'] ?></div>
                    <div class="parametr">Характеристика товара: <?= $products['parametr'] ?></div>
                    <div class="count">Количество: <?= $products['count'] ?></div>
                    <div class="price">Цена: <?= $products['price'] ?></div>
                    <div class="id_user">Продавец: <?= $products['name'] ?></div>
                    <a href="/itemA.php/item1.php" class="btn btn-primary">В корзину</a>
                </div>
            </div>
        <?php endforeach; ?>


    </div>

    <?php include '/OSPanel/domains/marplct/app/include/footer.php'; ?>
</body>