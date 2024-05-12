<?php
include '/OSPanel/domains/marplct/app/database/db.php';
include '/OSPanel/domains/marplct/path.php';


$errMsg = '';
$id = '';
$title = '';
$content = '';
$img = '';
$topic = '';

$topics = selectAll('Topics');       
$news = selectAll('News');

//код создания записи
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_news'])) {

    $title = $_POST['title'];
    $content = trim($_POST['content']);
    $topic = trim($_POST['topic']);
    $done = isset($_POST['done']) ? 1 : 0;

    if ($title === '' ||  $content === '' || $topic === '') {
        $errMsg = "Не все поля заполнены!";
    } elseif (mb_strlen($title, 'UTF8') < 7) {
        $errMsg = "Название должно быть более 7-х символов";
    } else {
        $news = [
            'id_user' =>  $_SESSION['ID'],
            'title' => $title,
            'img' => $img,
            'content' => $content,
            'status' => $done,
            'id_topic' => $topic,
        ];

        $news = insert('News', $news);
        $news = selectOne('News', ['id' => $id]);
        header('location:' . BASE_URL . 'admin/news/index.php');
    }
} else {

    $title = '';
    $content = '';
    $topic = '';
    $done = '';
}
