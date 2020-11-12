<?php 
    if (isset($_GET['id'])) {
        // Connect to the MySQL database  
        include('../config/db.php');
        require_once("DBController.php");
        $db_handle = new DBController();
        
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

        
	$product_array = $db_handle->runQuery("SELECT * FROM products ORDER BY id ASC");
	if (!empty($product_array)) { 
		foreach($product_array as $key=>$value){
		}
	}
	
        //echo all data
        //echo $product_name . "<br>" . $price . "€<br>" . $description . "<br>" . $type . "<br>" . "<a href='#'>Add to Cart</a>" .  "<br>" . "<a href='index.php'>Back</a>";


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
    
    <div class="container">
        <div class="row">
            <div class="col-sm-6"><img class="img-fluid" src="img/<?php echo $id ?>.jpg" alt="HAT: <?php echo $id ?>"></div>
            
            <div class="col-sm-6"><?php echo $product_name . "<br>" . $price . "€<br>" . $description . "<br>" . $type . "<br>";?>
                <form method="post" action="post"><button type="submit" class="btn btn-primar">Add to Cart</button></form>
                <a href="index.php" action='cart.php?action=add&id=<?php $_GET['id']; ?>>Back</a>
            </div>
        </div>
    </div>

</body>
</html>