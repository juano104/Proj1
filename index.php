<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hat Shop</title>
</head>
<body>
    <h2>Juan's Hats</h2>
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

        $sql = "Select * from products";
        $result = $conn->query($sql);

        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                echo $row["name"] . ": " . $row["price"] . "€" . "<br><br>";
            }
        }else{
            echo "0 results";
        }
        $conn->close();

    ?>


</body>
</html>