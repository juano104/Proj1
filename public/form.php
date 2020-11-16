<?php

if (isset($_POST['save'])) {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $type = $_POST['type'];
    $price = $_POST['price'];
    $sql = "INSERT INTO employee (name,description,type,price)
	VALUES ('$name','$description','$type','$price')";
    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully !";
    } else {
        echo "Error: " . $sql . "
" . mysqli_error($conn);
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
    <form action="form.php" method="post">
        <div class="container">
            <div class="form_group">
                <label>Name:</label>
                <input type="text" name="name" value="" required />
            </div>
            <div class="form_group">
                <label>Description:</label>
                <input type="text" name="decription" value="" />
            </div>
            <div class="form_group">
                <label>Type:</label>
                <input type="text" name="type" value="" />
            </div>
            <div class="form_group">
                <label>Price:</label>
                <input type="text" name="price" value="" required />
            </div>
        </div>
    </form>
</body>

</html>