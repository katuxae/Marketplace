<?php
include '/OSPanel/domains/marplct/app/database/db.php';
include '/OSPanel/domains/marplct/path.php';

$errMsg = '';
$id = '';
$name = '';
$description = '';
$topics = selectAll('Topics');        //вызов всего, что есть в бд

//код создания категории
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['topic-create'])) {

    $name = $_POST['name'];
    $description = trim($_POST['description']);

    if ($name === '' || $description === '') {
        $errMsg = "Не все поля заполнены!";
    } elseif (mb_strlen($name, 'UTF8') < 2) {
        $errMsg = "Название должно быть более 2-х символов";
    } else {
        $existence = selectOne('Topics', ['name' => $name]);
        if ($existence['name'] === $name) {
            $errMsg = "Такой name уже используется";
        } else {

            $topic = [
                'name' => $name,
                'description' => $description,
            ];
            $id = insert('Topics', $topic);
            $topic = selectOne('Topics', ['id' => $id]);
            header('location:' . BASE_URL . 'admin/topics/index.php');
        }
    }
} else {
    $name = '';
    $description = '';
}
//форма редактирования категории

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
    $id = $_GET['id'];
    $topic = selectOne('Topics', ['id' => $id]);

    $id = $topic['id'];
    $name = $topic['name'];
    $description = $topic['description'];
}
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['topic-edit'])) {

    $name = $_POST['name'];
    $description = trim($_POST['description']);

    if ($name === '' || $description === '') {
        $errMsg = "Не все поля заполнены!";
    } elseif (mb_strlen($name, 'UTF8') < 2) {
        $errMsg = "Название должно быть более 2-х символов";
    } else {
        $topic = [
            'name' => $name,
            'description' => $description,
        ];
        $id = $_POST['id'];
        $topic_id = update('Topics',  $id, $topic);
        header('location:' . BASE_URL . 'admin/topics/index.php');
    }
}


//удаление категории

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['del_id'])) {
    $id = $_GET['del_id'];
    delete('Topics', $id);
    header('location:' . BASE_URL . 'admin/topics/index.php');
}
