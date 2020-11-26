<?php
session_start();
if (isset($_GET['id'])) {
    
    // Connect to the MySQL database  
    include('../config/db.php');
    require_once("DBController.php");
    $db_handle = new DBController();

    // Create connection
    $mysqli = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($mysqli->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $id = preg_replace('#[^0-9]#i', '', $_GET['id']);

    $sql = "SELECT * FROM products WHERE id='$id' LIMIT 1";
    $result = $mysqli->query($sql);

    $row = $result->fetch_assoc();
    $product_name = $row["name"];
    $id = $row["id"];
    $price = $row["price"];
    $description = $row["description"];
    $type = $row["type"];


    /*$product_array = $db_handle->runQuery("SELECT * FROM products ORDER BY id ASC");
    if (!empty($product_array)) {
        foreach ($product_array as $key => $value) {
        }
    }*/
} else {
    echo "Theres a problem with the query";
}

$mysqli->close();
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
    <title>Product</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script>
        function changeLang() {
            document.getElementById('form_lang').submit();
        }
    </script>
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
                    <li class="nav-item"><a href="cart.php" class="nav-link"><?= _MYCART ?></a></li>
                    <li class="nav-item">
                        <form method="get" action="" id="form_lang">
                            <select name='lang' onchange='changeLang();'>
                                <option value='en' <?php if (isset($_SESSION['lang']) && $_SESSION['lang'] == 'en') {
                                                        echo "selected";
                                                    } ?>>English</option>
                                <option value='es' <?php if (isset($_SESSION['lang']) && $_SESSION['lang'] == 'es') {
                                                        echo "selected";
                                                    } ?>>Spanish</option>
                            </select>
                            <!--<div class="dropdown">
                                <a class=" nav-link dropdown-toggle" href="#" id="dropdownMenuLink" data-toggle="dropdown">
                                    Languages
                                </a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <a class="dropdown-item" href="#">English</a>
                                    <a class="dropdown-item" href="#">Español</a>
                                </div>
                            </div>-->
                        </form>
                    </li>
                    <li class="nav-item"><a href="form.php" class="nav-link"><?= _FORM ?></a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col-sm-6"><img class="img-fluid" src="img/<?php echo $id ?>.jpg" alt="HAT: <?php echo $id ?>"></div>

            <div class="col-sm-6"><?php echo $product_name . "<br>" . $price . "€<br>" . $description . "<br>" . $type . "<br>"; ?>
                <form method="post" action="cart.php?action=add&id=<?php echo $id; ?>">
                    <button type="submit" class="btn btn-primary"><?= _ADDTOCART ?></button>
                    <input type="text" name="quantity" value="1" size="2" />
                </form>
                <a href="index.php"><?= _BACK ?></a>
            </div>
        </div>
    </div>

</body>

</html>