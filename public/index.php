<?php
session_start();
include('../config/db.php');
$status = "";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//make query
$sql = "Select id, name, price from products";
$result = $conn->query($sql);
$conn->close();

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
    <title>Hat Shop</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/card.css">
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
                <!-- Logo Text -->
                <span class="text-uppercase font-weight-bold">HatShop</span>
            </a>

            <button type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler"><span class="navbar-toggler-icon"></span></button>

            <div id="navbarSupportedContent" class="collapse navbar-collapse">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active"><a href="index.php" class="nav-link">Home <span class="sr-only">(current)</span></a></li>
                    <li class="nav-item"><a href="cart.php" class="nav-link">MyCart</a></li>
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
                    <li class="nav-item"><a href="form.php" class="nav-link">Form</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <section id="services">
        <div class="container">
            <h2 class="text-center">Juan's Hats</h2>
            <div class="row">

                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $id = $row["id"];
                        $product_name = $row["name"];
                        $price = $row["price"];
                        //echo all data
                        //echo $product_name . " " . $price . "€ "  ."<a href='product.php?id=$id'>View</a>" . "<br><br>";
                ?>

                        <div class="col-md-4">
                            <div class="card text-center">
                                <img src="img/<?php echo $id; ?>.jpg" alt="hat: <?php echo $id; ?>">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $product_name; ?></h5>
                                    <p class="card-text"><?php echo $price; ?>€</p>
                                    <?php echo "<a href='product.php?id=$id'>View</a>" ?>
                                </div>
                            </div>
                        </div>

                <?php
                    }
                } else {
                    echo "0 results";
                }
                ?>

            </div>
        </div>
    </section>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>


</body>

</html>