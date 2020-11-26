<?php
session_start();
include('../config/db.php');
require_once("DBController.php");
$db_handle = new DBController();
if (!empty($_GET["action"])) {
    switch ($_GET["action"]) {
        case "add":
            if (!empty($_POST["quantity"])) {
                $productByCode = $db_handle->runQuery("SELECT * FROM products WHERE id=" . $_GET["id"]);
                $itemArray = array($productByCode[0]["id"] => array('name' => $productByCode[0]["name"], 'id' => $productByCode[0]["id"], 'quantity' => $_POST["quantity"], 'price' => $productByCode[0]["price"]));
                if (!empty($_SESSION["cart_item"])) {
                    if (in_array($productByCode[0]["id"], array_keys($_SESSION["cart_item"]))) {
                        foreach ($_SESSION["cart_item"] as $k => $v) {
                            if ($productByCode[0]["id"] == $k) {
                                if (empty($_SESSION["cart_item"][$k]["quantity"])) {
                                    $_SESSION["cart_item"][$k]["quantity"] = 0;
                                }
                                $_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
                            }
                        }
                    } else {
                        $_SESSION["cart_item"] = array_merge($_SESSION["cart_item"], $itemArray);
                    }
                } else {
                    $_SESSION["cart_item"] = $itemArray;
                }
            }
            break;
        case "remove":
            if (!empty($_SESSION["cart_item"])) {
                foreach ($_SESSION["cart_item"] as $k => $v) {
                    if ($_GET["id"] == $k)
                        unset($_SESSION["cart_item"][$k]);
                    if (empty($_SESSION["cart_item"]))
                        unset($_SESSION["cart_item"]);
                }
            }
            break;
        case "empty":
            unset($_SESSION["cart_item"]);
            break;
    }
}
// Set Language variable
if (isset($_GET['lang']) && !empty($_GET['lang'])) {
    $_SESSION['lang'] = $_GET['lang'];

    if (isset($_SESSION['lang']) && $_SESSION['lang'] != $_GET['lang']) {
        echo "<script type='text/javascript'> location.reload(); </script>";
    }
}

// Include Language file
if (isset($_SESSION['lang'])) {
    include "lang_" . $_SESSION['lang'] . ".php";
} else {
    include "lang_en.php";
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body>

    <nav class="navbar navbar-expand-lg py-3 navbar-dark bg-dark shadow-sm">
        <div class="container">
            <a href="index.php" class="navbar-brand">
                <!-- Logo Image -->
                <img src="img/logo.jpg" width="45" alt="logo" class="d-inline-block align-middle mr-2">
            </a>

            <button type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler"><span class="navbar-toggler-icon"></span></button>

            <div id="navbarSupportedContent" class="collapse navbar-collapse">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a href="index.php" class="nav-link"><?= _HOME ?></a></li>
                    <li class="nav-item active"><a href="cart.php" class="nav-link"><?= _MYCART ?> </a></li>
                    <li class="nav-item"><a href="form.php" class="nav-link"><?= _FORM ?></a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <h2 class="display-4 text-center"><?= _SHOPPINGCART ?></h2>

        <a href="cart.php?action=empty" class="btn btn-danger"><?= _CLEARCART ?></a>
        <a href="index.php" class="btn btn-primary"><?= _KEEPSHOPPING ?></a>
        <?php
        if (isset($_SESSION["cart_item"])) {
            $total_quantity = 0;
            $total_price = 0;
        ?>
            <table cellpadding="10" cellspacing="1">
                <tbody>
                    <tr>
                        <th style="text-align:left;"><?= _NAME ?></th>
                        <th style="text-align:left;">ID</th>
                        <th style="text-align:right;" width="10%"><?= _UNITPRICE ?></th>
                        <th style="text-align:right;" width="5%"><?= _QUANTITY ?></th>
                        <th style="text-align:right;" width="10%"><?= _PRICE ?></th>
                        <th style="text-align:center;" width="5%"><?= _REMOVE ?></th>
                    </tr>
                    <?php
                    foreach ($_SESSION["cart_item"] as $item) {
                        $item_price = $item["quantity"] * $item["price"];
                    ?>
                        <tr>
                            <td><?php echo $item["name"]; ?></td>
                            <td><?php echo $item["id"]; ?></td>
                            <td style="text-align:right;"><?php echo "€ " . $item["price"]; ?></td>
                            <td style="text-align:right;"><?php echo $item["quantity"]; ?></td>
                            <td style="text-align:right;"><?php echo "€ " . number_format($item_price, 2); ?></td>
                            <td style="text-align:center;"><a href="cart.php?action=remove&id=<?php echo $item["id"]; ?>" class="btn"><?= _REMOVEITEM ?></a></td>
                        </tr>
                    <?php
                        $total_quantity += $item["quantity"];
                        $total_price += ($item["price"] * $item["quantity"]);
                    }
                    ?>
                    <tr>
                        <td colspan="2" align="right">Total:</td>
                        <td align="right"><?php echo $total_quantity; ?></td>
                        <td align="right" colspan="2"><strong><?php echo "€ " . number_format($total_price, 2); ?></strong></td>
                        <td align="right"><button class="btn btn-success"><?= _BUY ?></button></td>
                    </tr>
                </tbody>
            </table>
        <?php
        } else {
        ?>
            <div class="container"><?= _CARTEMPTY ?></div>
        <?php
        }
        ?>
    </div>

</body>

</html>