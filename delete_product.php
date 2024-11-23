<?php
include("db_connection.php");
include("cart_naming.php");

$productId = $_POST["productId"];

    $deleteRow = "DELETE FROM $tableName WHERE product_id = $productId;";
    $deleteResult = $conn->query($deleteRow);

    if(!$deleteResult){
        echo "<p> There was an error with removing the product form the cart, please try again later </p>";
    } else {
        header("Location: check_out.php");
    }
                            
                            ?>