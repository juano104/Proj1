<?php
session_start();

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
    <title>Form</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/card.css">
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

            <button type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"
                class="navbar-toggler"><span class="navbar-toggler-icon"></span></button>

            <div id="navbarSupportedContent" class="collapse navbar-collapse">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a href="index.php" class="nav-link"><?= _HOME ?></a></li>
                    <li class="nav-item"><a href="cart.php" class="nav-link"><?= _MYCART ?></a></li>
                    <li class="nav-item active"><a href="form.php" class="nav-link"><?= _FORM ?></a></li>
                </ul>
            </div>
        </div>
    </nav>

    <h2><?= _ENTERPRODUCT ?></h2>
    <form method="post" action="formprocess.php">
        <div class="container">
        <?= _PRODUCTNAME ?>:<br>
            <input type="text" name="name">
            <br>
            <?= _DESCRIPTION ?>:<br>
            <input type="text" name="description">
            <br>
            <?= _TYPE ?>:<br>
            <input type="text" name="type">
            <br>
            <?= _PRICE ?>:<br>
            <input type="text" name="price">
            <br><br>
            <input type="submit" name="save" value="<?= _SUBMIT ?>">
        </div>

    </form>
</body>

</html>