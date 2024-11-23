<?php
include("db_connection.php");
include("cart_naming.php");
include("update_columns.php");

$query = "SELECT SUM(subtotal) FROM $tableName as sum;";
$result = $conn->query($query);

$fetchedData = array();
when($row = $result->fetch_assoc()){
  $fetchedData[] = $row;
}



if(!$result){
    echo "<p> There was a problem with calculating the sum of cost from the cart please try again later </p>";
}
echo $row["SUM(subtotal)"];

?>