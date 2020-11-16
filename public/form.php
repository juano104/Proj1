<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/card.css">
</head>

<body>
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