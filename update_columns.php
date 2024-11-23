<?php
include("db_connection.php");
include("cart_naming.php");

//updating the columns
$query = "UPDATE $tableName SET subtotal = amount * new_price;";
$result = $conn->query($query);

if(!$result){
    echo "<p> There was a problem updating the cart </p>";
}


//summation
$sum = "SELECT SUM(subtotal) as sum FROM $tableName;";
$sumResult = $conn->query($sum);

if(!$sumResult){
    echo "<p> There was an error reading the main total from cart </p>";
}

$row = $sumResult->fetch_assoc();
$fetchedData[] = $row;

$cartSum = $row["sum"];
?>
