<?php
include '/OSPanel/domains/marplct/app/database/db.php';
include '/OSPanel/domains/marplct/path.php';


$errMsg = '';
$id = '';
$name = '';
$parametr = '';
$img = '';
$topic = '';
$count = '';
$price = '';

$topics = selectAll('Topics');        //вызов всего, что есть в бд
$products = selectAll('Products');
$productsAdm = selectAllFromProductsWithUser('Products', 'User', 'Topics');


//код создания товара в админке

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_product'])) {

    $name = trim($_POST['name']);
    $parametr = trim($_POST['parametr']);
    $topic = trim($_POST['topic']);
    $count = trim($_POST['count']);
    $price = trim($_POST['price']);
    $done = isset($_POST['done']) ? 1 : 0;


    if ($name === '' ||  $parametr === '' || $topic === '' || $count === '' || $price === '') {
        $errMsg = "Не все поля заполнены!";
    } elseif (mb_strlen($name, 'UTF8') < 5) {
        $errMsg = "Название должно быть более 7-х символов";
    } else {
        $products = [
            'id_user' => $_SESSION['ID'],
            'id_topic' => $topic,
            'name' => $name,
            'parametr' => $parametr,
            'count' => $count,
            'price' => $price,
            'img' => $img,
            'status' => $done,

        ];


        $products = insert('Products', $products);
        $products = selectOne('Products', ['id' => $id]);
        header('location:' . BASE_URL . 'admin/products/index.php');
    }
} else {
    $id = '';
    $name = '';
    $parametr = '';
    $count = '';
    $price = '';
    $topic = '';
    $done = '';
}

//форма редактирования товара в админке

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
    $id = $_GET['id'];
    $products = selectOne('Products', ['id' => $id]);

    $id = $products['id'];
    $name = $products['name'];
    $parametr = $products['parametr'];
    $count = $products['count'];
    $price = $products['price'];
}
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['product-edit'])) {

    $name = trim($_POST['name']);
    $parametr = trim($_POST['parametr']);
    $topic = trim($_POST['topic']);
    $count = trim($_POST['count']);
    $price = trim($_POST['price']);



    if ($name === '' ||  $parametr === '' || $topic === '' || $count === '' || $price === '') {
        $errMsg = "Не все поля заполнены!";
    } elseif (mb_strlen($name, 'UTF8') < 5) {
        $errMsg = "Название должно быть более 7-х символов";
    } else {
        $products = [
            'id_user' => $_SESSION['ID'],
            'id_topic' => $topic,
            'name' => $name,
            'parametr' => $parametr,
            'count' => $count,
            'price' => $price,
            'img' => $img,


        ];

        $id = $_POST['id'];
        $products_id = update('Products',  $id, $products);
        header('location:' . BASE_URL . 'admin/products/index.php');
    }
}

//удаление товара в админке

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['del_id'])) {
    $id = $_GET['del_id'];
    delete('Products', $id);
    header('location:' . BASE_URL . 'admin/products/index.php');
}

