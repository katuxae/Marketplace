<?php
session_start();
include '/OSPanel/domains/marplct/app/database/db.php';

$status = "";
if (isset($_POST['code']) && $_POST['code'] != "") {
    $code = $_POST['code'];
    $sql =  "SELECT * FROM `Products` WHERE `code`='$code'";
    foreach ($pdo->query($sql) as $row) {
        $name = $row['namep'];
        $code = $row['code'];
        $price = $row['price'];
        $image = $row['image'];
    }

    $cartArray = array(
        $code => array(
            'namep' => $name,
            'code' => $code,
            'price' => $price,
            'count' => 1,
            'image' => $image
        )
    );

    if (empty($_SESSION["shopping_cart"])) {
        $_SESSION["shopping_cart"] = $cartArray;
        $status = "<div class='box'>Product is added to your cart!</div>";
    } else {
        $array_keys = array_keys($_SESSION["shopping_cart"]);
        if (in_array($code, $array_keys)) {
            $status = "<div class='box' style='color:red;'>
	Product is already added to your cart!</div>";
        } else {
            $_SESSION["shopping_cart"] = array_merge(
                $_SESSION["shopping_cart"],
                $cartArray
            );
            $status = "<div class='box'>Product is added to your cart!</div>";
        }
    }
}
?>

<html>

<head>
    <title>Demo Simple Shopping Cart using PHP and MySQL - AllPHPTricks.com</title>
    <link rel='stylesheet' href='css/style.css' type='text/css' media='all' />
</head>

<body>
    <div style="width:700px; margin:50 auto;">

        <h2>Предпросмотр Корзина</h2>

        <?php
        if (!empty($_SESSION["shopping_cart"])) {
            $cart_count = count(array_keys($_SESSION["shopping_cart"]));
        ?>
            <div class="cart_div">
                <a href="/basket.php"><img src="cart-icon.png" /> Cart<span><?php echo $cart_count; ?></span></a>
            </div>
        <?php
        }

        // $id = selectOne($Products, ['id']);
        $sql = "SELECT * FROM `Products` Where id = 2";
        foreach ($pdo->query($sql) as $row) {
            echo "<div class='product_wrapper'>
            <form method='post' action=''>  
            <input type='hidden' name='code' value=" . $row['code'] . " />
            
            <div class='name'>" . $row['namep'] . "</div>
            <div class='price'>$" . $row['price'] . "</div>
            <button type='submit' class='buy'>Добавить в корзину</button>
            </form>
            </div>";
        }
        ?>
        <a href="/basket.php" name="add_in_basket" class="btn btn-primary">Перейти в корзину</a>
        <div style="clear:both;"></div>

        <div class="message_box" style="margin:10px 0px;">
            <?php echo $status; ?>
        </div>


    </div>
</body>

</html>