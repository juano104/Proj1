<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>
</head>
<body>
<h2>Juan's Hats</h2>
<?php 
    //if (isset($_GET['id'])) {
        // Connect to the MySQL database  
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

        if(isset($_GET['id'])){
            $id = htmlentities($_GET['id']);

            $query = "SELECT * FROM table WHERE id = " . $id;
        } else{
            $query = "SELECT * FROM table ORDER BY id";
        } 

        //$sql = "SELECT * FROM products WHERE id='$id' LIMIT 1";
        //$result = $conn->query($sql); // count the output amount
        if ($result = $mysqli->query($query)) {
            if($result->num_rows < 0){
                while($row = $result->fetch_object()){ 
                    $product_name = $row["name"];
                    $price = $row["price"];
                    $description = $row["description"];
                    $type = $row["type"];
    
                    echo $product_name . " " . $price . " " . $description . " " . $type . " " . "<a href='#'>Add to Cart</a>";
                    }
            }else {
                echo "That item does not exist.";
                
            }
        } else{
            echo "Theres a problem with the query.";
        }
    $mysqli->close();
?>
</body>
</html>


