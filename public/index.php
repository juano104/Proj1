<?php

        include'../config/db.php';

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
    

    <div class="container">
    <h2 class="text-center">Juan's Hats</h2>
        
            <?php 
                if($result->num_rows > 0){
                    while($row = $result->fetch_assoc()){
                        $id = $row["id"];
                        $product_name = $row["name"];
                        $price = $row["price"];
                        //echo all data
                        //echo $product_name . " " . $price . "€ "  ."<a href='product.php?id=$id'>View</a>" . "<br><br>";
            ?>
            <div class="row">
                <div class="col-sm-4">
                    <?php echo "<img src='$id.jpg' alt='hat $id'/>" ?>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <?php echo $product_name . " " . $price . "€ "  ."<a href='product.php?id=$id'>View</a>" . "<br><br>"; ?>
                </div>
            </div>
            
            <?php
                    }
                }else{
                    echo "0 results";
                }
            ?>

    
    </div>

</body>
</html>