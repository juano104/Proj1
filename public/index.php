<?php

        $servername = "0.0.0.0";
        $username = "priori";
        $password = "password";
        $dbname = "HatShop";

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

    ?>







<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hat Shop</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <h2>Juan's Hats</h2>

    <div class="container">
        <div class="row">

            <?php 
                if($result->num_rows > 0){
                    while($row = $result->fetch_assoc()){
                        $id = $row["id"];
                        $product_name = $row["name"];
                        $price = $row["price"];
                        //echo all data
                        //echo $product_name . " " . $price . "€ "  ."<a href='product.php?id=$id'>View</a>" . "<br><br>";
            ?>

            <div class="col-sm-4"><?php echo $product_name . " " . $price . "€ "  ."<a href='product.php?id=$id'>View</a>" . "<br><br>"; ?></div>

            <?php
                    }
                }else{
                    echo "0 results";
                }
            ?>

        </div>
    </div>

</body>
</html>