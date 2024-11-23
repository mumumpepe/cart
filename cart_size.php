<?php
include("db_connection.php");
include("cart_naming.php");

$cartSizeQuery = "SELECT COUNT(DISTINCT(product_id)) as cart_size FROM $tableName;";
$cartSizeResult = $conn->query($cartSizeQuery);


//retrieving the informaton from query
$cartSizeRow = $cartSizeResult->fetch_assoc();
$cartSize = $cartSizeRow["cart_size"];

if(!$cartSizeResult){
    echo "<p> There was an issue with looking in the cart, please try again later </p>";
}

echo $cartSize;


?>
