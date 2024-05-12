<?php
$host = 'marplct';
$data = 'Marplct';
$user = 'root';
$pass = '';
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
];


try {
    $pdo = new PDO("mysql:host=marplct;dbname=Marplct", $user = "root", $pass = "");
} catch (PDOException $i) {
    die("Ошибка подключения к базе данных");
}
