<?php
session_start();
include('../config/db.php');
require_once("DBController.php");
$db_handle = new DBController();
if(!empty($_GET["action"])) {
switch($_GET["action"]) {
	case "add":
		if(!empty($_POST["quantity"])) {
            $productByCode = $db_handle->runQuery("SELECT * FROM products WHERE id='" . $_GET["id"] . "'");
			$itemArray = array($productByCode[0]["id"]=>array('name'=>$productByCode[0]["name"], 'id'=>$productByCode[0]["id"], 'price'=>$productByCode[0]["price"]));
			
			if(!empty($_SESSION["cart_item"])) {
				if(in_array($productByCode[0]["id"],array_keys($_SESSION["cart_item"]))) {
					foreach($_SESSION["cart_item"] as $k => $v) {
							if($productByCode[0]["id"] == $k) {
								if(empty($_SESSION["cart_item"][$k]["quantity"])) {
									$_SESSION["cart_item"][$k]["quantity"] = 0;
								}
								$_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
							}
					}
				} else {
					$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
				}
			} else {
				$_SESSION["cart_item"] = $itemArray;
			}
		}
	break;
	case "remove":
		if(!empty($_SESSION["cart_item"])) {
			foreach($_SESSION["cart_item"] as $k => $v) {
					if($_GET["id"] == $k)
						unset($_SESSION["cart_item"][$k]);				
					if(empty($_SESSION["cart_item"]))
						unset($_SESSION["cart_item"]);
			}
		}
	break;
	case "empty":
		unset($_SESSION["cart_item"]);
	break;	
}
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
                <li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
                <li class="nav-item active"><a href="cart.php" class="nav-link">MyCart <span class="sr-only">(current)</span></a></li>
                <li class="nav-item"><a href="#" class="nav-link">Services</a></li>
                <li class="nav-item"><a href="form.php" class="nav-link">Form</a></li>
            </ul>
            </div>
        </div>
    </nav>
    
    <div class="container">
        <h2 class="display-4 text-center">Shopping Cart</h2>

        <a href="cart.php?action=empty" class="btn btn-danger">Clear Cart</a>
        <a href="index.php" class="btn btn-primary">Keep Shopping</a>
        <?php
        if(isset($_SESSION["cart_item"])){
            $total_quantity = 0;
            $total_price = 0;
        ?>	
        <table class="tbl-cart" cellpadding="10" cellspacing="1">
            <tbody>
                <tr>
                <th style="text-align:left;">Name</th>
                <th style="text-align:left;">ID</th>
                <th style="text-align:right;" width="5%">Quantity</th>
                <th style="text-align:right;" width="10%">Price</th>
                <th style="text-align:center;" width="5%">Remove</th>
                </tr>	
                <?php		
                foreach ($_SESSION["cart_item"] as $item){
                $item_price = $item["quantity"]*$item["price"];
                ?>
                    <tr>
                    <td><?php echo $item["name"]; ?></td>
                    <td><?php echo $item["id"]; ?></td>
                    <td style="text-align:right;"><?php echo "€ ".$item["price"]; ?></td>
                    <td style="text-align:center;"><a href="cart.php?action=remove&id=<?php echo $item["id"]; ?>" class="btn">Remove Item</a></td>
                    </tr>
                    <?php
                    $total_quantity += $item["quantity"];
                    $total_price += ($item["price"]*$item["quantity"]);
                }
                ?>
            </tbody>
        </table>		
        <?php
        } else {
        ?>
        <div class="no-records">Your Cart is Empty</div>
        <?php 
        }
        ?>
    </div>

</body>
</html>