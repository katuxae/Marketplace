<?php
include '/OSPanel/domains/marplct/app/database/session.php';
include '/OSPanel/domains/marplct/app/database/connect.php';
include '/OSPanel/domains/marplct/path.php';
function tt($value)
{
    echo '<pre>';
    print_r($value);
    echo '</pre>';
}
// Проверка выполнения запроса к БД
function dbCheckError($query)
{
    $errInfo = $query->errorInfo();
    if ($errInfo[0] !== PDO::ERR_NONE) {
        echo $errInfo[2];
        exit();
    }
    return true;
}
// Запрос на получение данных одной таблицы

function selectAll($table, $params = [])
{
    global $pdo;
    $sql = "SELECT * FROM $table";
    if (!empty($params)) {
        $i = 0; //создаем счётчик чтобы сначала прошёл по if $i = 0 === 0, а потом if $i = 1 === 1 зашёл в else
        foreach ($params as $key => $value) {
            if (!is_numeric($value)) //что бы не было sql ошибки надо добавить в кавычки, так же проверить не являеться ли значение числом
            {
                $value = "'" . $value . "'";
            }
            if ($i === 0) {
                $sql = $sql . " WHERE $key = $value";
            } else {
                $sql = $sql . " AND $key = $value";
            }
            $i++;
        }
    }
    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query->fetchAll();
}
//запрос на получение одной строки с выбранной таблицы
function selectOne($table, $params = [])
{
    global $pdo;
    $sql = "SELECT * FROM $table";
    if (!empty($params)) {
        $i = 0; //создаем счётчик чтобы сначала прошёл по if $i = 0 === 0, а потом if $i = 1 === 1 зашёл в else
        foreach ($params as $key => $value) {
            if (!is_numeric($value)) //что бы не было sql ошибки надо добавить в кавычки, так же проверить не являеться ли значение числом
            {
                $value = "'" . $value . "'";
            }
            if ($i === 0) {
                $sql = $sql . " WHERE $key = $value";
            } else {
                $sql = $sql . " AND $key = $value";
            }
            $i++;
        }
    }
  //  $sql = $sql . " LIMIT 1";

    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query->fetch();
}


// Запись в таблицу БД
function insert($table, $params)
{
    global $pdo;
    $i = 0;
    $coll = '';
    $mask = '';
    foreach ($params as $key => $value) {
        if ($i === 0) {
            $coll = $coll . "$key";
            $mask = $mask . "'" . "$value" . "'";
        } else {
            $coll = $coll . ", $key";
            $mask = $mask . ", '" . "$value" . "'";
        }
        $i++;
    }

    $sql = "INSERT INTO $table ($coll) VALUES ($mask)";

    $query = $pdo->prepare($sql);
    $query->execute($params);
    dbCheckError($query);
    return $pdo->lastInsertId();
}


// Обновление строки в таблице
function update($table, $id, $params)
{
    global $pdo;
    $i = 0;
    $str = '';
    foreach ($params as $key => $value) {
        if ($i === 0) {
            $str = $str . $key . " = '" . $value . "'";
        } else {
            $str = $str . ", " . $key . " = '" . $value . "'";
        }
        $i++;
    }

    $sql = "UPDATE $table SET $str WHERE id = $id";

    $query = $pdo->prepare($sql);
    $query->execute($params);
    dbCheckError($query);
}


// Обновление строки в таблице
function delete($table, $id)
{
    global $pdo;
    //DELETE FROM `topics` WHERE id = 3
    $sql = "DELETE FROM $table WHERE id =" . $id;
    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
}
// выборка товаров с продавцом в админку
function selectAllFromProductsWithUser($table1, $table2, $table3)
{
    global $pdo;
    $sql = "SELECT 
    t1.id,
    t1.namep,
    t1.parametr,
    t1.count,
    t1.price,
    t1.img,    
    t1.status,
    t1.date_create,
    t2.email,
    t3.namet
    FROM $table1 AS t1 JOIN $table2 AS t2 JOIN $table3 AS t3 ON t1.id_user = t2.ID AND t1.id_topic = t3.id";
    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query->fetchAll();
}

// Выборка товаров с продавцом в карточки товаров Аудио
function selectAllFromProductsWithUserOnItemA($table1, $table2, $table3)
{
    global $pdo;
    $sql = "SELECT p.*, u.name, t.namet FROM $table1 AS p JOIN $table2 AS u JOIN $table3 AS t ON p.id_user = u.ID AND p.id_topic = t.id WHERE p.status = 1 AND p.id_topic = 2";
    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query->fetchAll();
}

// Выборка товаров с продавцом в карточки товаров Видео
function selectAllFromProductsWithUserOnItemV($table1, $table2, $table3)
{
    global $pdo;
    $sql = "SELECT p.*, u.name, t.namet FROM $table1 AS p JOIN $table2 AS u JOIN $table3 AS t ON p.id_user = u.ID AND p.id_topic = t.id WHERE p.status = 1 AND p.id_topic = 3";
    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query->fetchAll();
}

// Выборка товаров с продавцом в карточки товаров Текст
function selectAllFromProductsWithUserOnItemT($table1, $table2, $table3)
{
    global $pdo;
    $sql = "SELECT p.*, u.name, t.namet FROM $table1 AS p JOIN $table2 AS u JOIN $table3 AS t ON p.id_user = u.ID AND p.id_topic = t.id WHERE p.status = 1 AND p.id_topic = 4";
    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query->fetchAll();
}
// Выборка товаров с продавцом в карточки товаров Реклама
function selectAllFromProductsWithUserOnItemR($table1, $table2, $table3)
{
    global $pdo;
    $sql = "SELECT p.*, u.name, t.namet FROM $table1 AS p JOIN $table2 AS u JOIN $table3 AS t ON p.id_user = u.ID AND p.id_topic = t.id WHERE p.status = 1 AND p.id_topic = 5";
    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query->fetchAll();
}

// Выборка товаров с продавцом в каталог
function selectAllFromProductsWithUserOnСatalog($table1, $table2)
{
    global $pdo;
    $sql = "SELECT p.*, t.namet FROM $table1 AS p JOIN $table2 AS t ON p.id_topic = t.id";
    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query->fetchAll();
}
