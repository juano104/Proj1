<?php
include('../config/db.php');
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if (isset($_POST['save'])) {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $type = $_POST['type'];
    $price = $_POST['price'];
    $sql = "INSERT INTO products (name,description,type,price)
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