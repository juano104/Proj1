<?php 
    if (isset($_GET['id'])) {
        // Connect to the MySQL database  
        $servername = "0.0.0.0";
        $username = "priori";
        $password = "password";
        $dbname = "HatShop";
        
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
        $price = $row["price"];
        $description = $row["description"];
        $type = $row["type"];
        //echo all data
        echo $product_name . "<br>" . $price . "€<br>" . $description . "<br>" . $type . "<br>" . "<a href='#'>Add to Cart</a>" .  "<br>" . "<a href='index.php'>Back</a>";
                    
    }else{
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
</head>
<body>
<h2>Juan's Hats</h2>

</body>
</html>

