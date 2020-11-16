<?php
include('../config/db.php');
if (isset($_POST['save'])) {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $type = $_POST['type'];
    $price = $_POST['price'];
    $sql = "INSERT INTO employee (name,description,type,price)
	VALUES ('$name','$description','$type','$price')";
    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully !<br>";
        echo "Would you like to enter another one? <a href='form.php'>YES</a>  <a href='index.php'>NO</a>";
    } else {
        echo "Error: " . $sql . " " . mysqli_error($conn);
    }
    mysqli_close($conn);
}

?>

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
    <form method="post" action="form.php">
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