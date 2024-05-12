<?php
include '/OSPanel/domains/marplct/path.php';
include '/OSPanel/domains/marplct/app/database/session.php';

$status = "";
if (isset($_POST['action']) && $_POST['action'] == "remove") {
    if (!empty($_SESSION["shopping_cart"])) {
        foreach ($_SESSION["shopping_cart"] as $key => $value) {
            if ($_POST['code'] == $key) {
                unset($_SESSION["shopping_cart"][$key]);
                $status = "<div class='box' style='color:red;'>
      Product is removed from your cart!</div>";
            }
            if (empty($_SESSION["shopping_cart"]))
                unset($_SESSION["shopping_cart"]);
        }
    }
}

if (isset($_POST['action']) && $_POST['action'] == "change") {
    foreach ($_SESSION["shopping_cart"] as &$value) {
        if ($value['code'] === $_POST["code"]) {
            $value['count'] = $_POST["count"];
            break; // Stop the loop after we've found the product
        }
    }
}



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

    <?php
    if (!empty($_SESSION["shopping_cart"])) {
        $cart_count = count(array_keys($_SESSION["shopping_cart"]));
    ?>
        <div class="cart_div">
            <a href="/app/controllers/index-basket.php">
                <img src="cart-icon.png" /> Предпросмотр корзины
                <span><?php echo $cart_count; ?></span></a>
        </div>
    <?php
    }
    ?>

    <div class="cart">
        <?

        if (isset($_SESSION['shopping_cart'])) {
            $total_price = 0;
        ?>
            <table class="table">
                <tbody>
                    <tr>
                        <td></td>
                        <td>Название товара</td>
                        <td>Количество</td>
                        <td>Цена товара</td>
                        <td>Сумма к оплате</td>
                    </tr>
                    <?php
                    foreach ($_SESSION["shopping_cart"] as $product) {
                    ?>
                        <tr>
                            <td>
                                <img src='/assets/img/7.jpg' width="50" height="40" />
                            </td>
                            <td><?php echo $product["namep"]; ?><br />
                                <form method='post' action=''>
                                    <input type='hidden' name='code' value="<?php echo $product["code"]; ?>" />
                                    <input type='hidden' name='action' value="remove" />
                                    <button type='submit' class='remove'>Удалить товар</button>
                                </form>
                            </td>
                            <td>
                                <form method='post' action=''>
                                    <input type='hidden' name='code' value="<?php echo $product["code"]; ?>" />
                                    <input type='hidden' name='action' value="change" />
                                    <select name='count' class='count' onChange="this.form.submit()">
                                        <option <?php if ($product["count"] == 1) echo "selected"; ?> value="1">1</option>
                                        <option <?php if ($product["count"] == 2) echo "selected"; ?> value="2">2</option>
                                        <option <?php if ($product["count"] == 3) echo "selected"; ?> value="3">3</option>
                                        <option <?php if ($product["count"] == 4) echo "selected"; ?> value="4">4</option>
                                        <option <?php if ($product["count"] == 5) echo "selected"; ?> value="5">5</option>
                                    </select>
                                </form>
                            </td>
                            <td><?php echo "₽" . $product["price"]; ?></td>
                            <td><?php echo "₽" . $product["price"] * $product["count"]; ?></td>
                        </tr>
                    <?php
                        $total_price += ($product["price"] * $product["count"]);
                    }
                    ?>
                    <tr>
                        <td colspan="5" align="right">
                            <strong>TOTAL: <?php echo "₽" . $total_price; ?></strong>
                        </td>
                    </tr>
                </tbody>
            </table>
        <?php
        } else {
            echo "<h3>Your cart is empty!</h3>";
        }
        ?>
    </div>

    <div style="clear:both;"></div>

    <div class="message_box">
        <?php echo $status; ?>
    </div>



    <?php include("app/include/footer.php"); ?>

    <!--footer end-->
</body>

</html>