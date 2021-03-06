<?php
session_start();
if (isset($_GET['id'])) {
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
    $id = $_GET['id'];
    $lang = $_SESSION['lang'];

    $sql = "select * from products".$lang." WHERE id='$id' LIMIT 1";
    $result = $mysqli->query($sql);

    $row = $result->fetch_assoc();
    $product_name = $row["name"];
    $id = $row["id"];
    $price = $row["price"];
    $description = $row["description"];
    $type = $row["type"];
} else {
    echo "Theres a problem with the query";
}

$mysqli->close();


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