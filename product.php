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
// Check to see the URL variable is set and that it exists in the database
if (isset($_GET['id'])) {
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

	$id = preg_replace('#[^0-9]#i', '', $_GET['id']); 
	// Use this var to check to see if this ID exists, if yes then get the product 
	// details, if no then exit this script and give message why
	$sql = "SELECT * FROM products WHERE id='$id' LIMIT 1";
	$result = $conn->query(); // count the output amount
    if ($result->num_rows > 0) {
		// get all the product details
		while($row = $result->fetch_assoc($sql)){ 
			$product_name = $row["name"];
			$price = $row["price"];
			$description = $row["description"];
            $type = $row["type"];

            echo $product_name . " " . $price . " " . $description . " " . $type . " " . "<a href='#'>Add to cart</a>";
            }
		
	} else {
		echo "That item does not exist.";
	    exit();
	}
		
} else {
	echo "Data to render this page is missing.";
	exit();
}
$conn->close();
?>
</body>
</html>


