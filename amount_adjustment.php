<?php
include("db_connection.php");
include("cart_naming.php");

$adjustedAmount = $_POST["adjustedAmount"];
$productId = $_POST["product_identity"];

$query = "UPDATE $tableName SET amount = $adjustedAmount WHERE product_id = $productId;";
$result = $conn->query($query);

if(!$result){
    echo "<p> There was an error with amount adjustment, please try again later </p>";
} else {
    header("Location: check_out.php");
}


?>