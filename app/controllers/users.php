<?php
//require_once 'app/database/session.php';
include '/OSPanel/domains/marplct/app/database/db.php';


ini_set('display_errors', 1);
error_reporting(E_ALL);
$errMsg = '';         // сообщение, о том что форма не до конца заполнена

function userAuth($user)
{
    $_SESSION['ID'] = $user['ID'];
    $_SESSION['login'] = $user['login'];
    $_SESSION['is_moder'] = $user['is_moder'];
    if ($_SESSION['is_moder']) {
        header('location: ' . BASE_URL . 'admin/products/index.php');
    } else {
        header('location: ' . BASE_URL);
    }
}

//Код регистрации
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['button-reg'])) {

    $name = $_POST['name'];
    $login = trim($_POST['login']);   //атрибут trim  удаляет случайно поставленные пробелы
    $email = trim($_POST['email']);
    $password1 = trim($_POST['password1']);
    $password2 = trim($_POST['password2']);
    $is_moder = 0;

    if ($login === '' || $email === '' || $password1 === '' || $name === '') {
        $errMsg = "Не все поля заполнены!";
    } elseif (mb_strlen($login, 'UTF8') < 2) {
        $errMsg = "Логин должен быть более 2-х символов";
    } elseif ($password1 !== $password2) {
        $errMsg = "Пароли должны соответствовать!";
    } else {
        $existence = selectOne('User', ['email' => $email]);
        if ($existence['email'] === $email) {
            $errMsg = "Такой email уже используется";
        } else {
            //$password1 = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $post = [
                'name' => $name,
                'email' => $email,
                'login' => $login,
                'password' => $password1,
                'is_buyer' => $is_moder,
                'is_seller' => $is_moder,
                'is_moder' => $is_moder,
                'is_manager' => $is_moder
            ];
            $id = insert('User', $post);
            $user = selectOne('User', ['ID' => $id]);
            userAuth($user);
        }
    }
} else {
    $name = '';
    $login = '';
}
//код авторизации


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['button-log'])) {

    $email = trim($_POST['email']);
    $password1 = trim($_POST['password']);

    if ($email === '' || $password1 === '') {
        $errMsg = "Не все поля заполнены!";
    } else {
        $existence = selectOne('User', ['email' => $email]);
        if ($existence and $password1 === $existence['password']) {
            userAuth($existence);
        } else {
            $errMsg = "Почта либо пароль введены неверно!";
        }
    }
} else {
    $email = '';
}
