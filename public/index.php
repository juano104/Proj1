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
    <link rel="stylesheet" href="css/card.css">
</head>
<body>
    
        <section id="services">
            <div class="container">
                <h2 class="text-center">Juan's Hats</h2>
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

                    <div class="col-md-4">
                        <div class="card text-center">
                            <img src="img/<?php echo $id;?>.jpg" alt="hat: <?php echo $id;?>">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $product_name;?></h5>
                                <p class="card-text"><?php echo $price;?></p>
                                <?php echo "<a href='product.php?id=$id'>View</a>"?>
                            </div>
                        </div>
                    </div>

                    <?php
                            }
                        }else{
                            echo "0 results";
                        }
                    ?>

                </div>
            </div>
        </section>
    

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>


</body>
</html>