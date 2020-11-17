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
                    <li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
                    <li class="nav-item"><a href="cart.php" class="nav-link">MyCart</a></li>
                    <li class="nav-item">
                        <div class="dropdown">
                            <a class=" nav-link dropdown-toggle" href="#" id="dropdownMenuLink" data-toggle="dropdown">
                                Languages
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="#">English</a>
                                <a class="dropdown-item" href="#">Español</a>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item active"><a href="form.php" class="nav-link">Form</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <h2>Enter Product</h2>
    <form method="post" action="formprocess.php">
        <div class="container">
            Product Name:<br>
            <input type="text" name="name">
            <br>
            Description:<br>
            <input type="text" name="description">
            <br>
            Type:<br>
            <input type="text" name="type">
            <br>
            Price:<br>
            <input type="text" name="price">
            <br><br>
            <input type="submit" name="save" value="Submit">
        </div>

    </form>
</body>

</html>