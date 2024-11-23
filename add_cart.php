<?php
include("db_connection.php");
include("cart_naming.php");

$product_id = $_POST["extracted_id"];

//making table for the cart of a specified user
$createQuery = "CREATE TABLE IF NOT EXISTS $tableName
(
product_id INT,
product_name varchar(255),
product_image varchar(255),
unity_price INT,
discount_percentage INT,
new_price INT,
amount INT,
subtotal INT,
time_stamp timestamp
); ";

$createResult = $conn->query($createQuery);

//Data retrival from the table product_details
$query = "SELECT product_id, product_name, product_picture, unity_price, discount_percentage, new_price FROM product_details WHERE product_id = $product_id;";
$result = $conn->query($query);

//checking if result was ok
if (!$result){
    echo "<p> There was a problem with data retrival at database, please try again later </p>";
}

//updating query to perform the math at new_price column
$updateQuery = "UPDATE product_details SET new_price = unity_price - ((discount_percentage/100)*unity_price);";
$updateResult = $conn->query($updateQuery);

if(!$updateResult){
    echo "<p> There was an error with updating the product database at new price </p>";
}

//fetching row and storing its values in an array
$fetchedData = array();
while($row = $result->fetch_assoc()){
    //variables declaration
$fetch_product_id = $row["product_id"];
$product_name = $row["product_name"];
$product_image = $row["product_picture"];
$unity_price = $row["unity_price"];
$discount_percentage = $row["discount_percentage"];
$new_price = $unity_price - (($discount_percentage/100) * $unity_price);
}


if (!$createResult){
    echo "<p> There was a problem with cart initiation, please try again later </p>";
} else {
  //processing insertion query
  $insertionQuery = "INSERT INTO $tableName (product_id, product_name, product_image, unity_price, discount_percentage, new_price)
  VALUES 
  ('".$fetch_product_id."', '".$product_name."', '".$product_image."', '".$unity_price."', '".$discount_percentage."', '".$new_price."' )";


$insertionResult = $conn->query($insertionQuery);

if (!$insertionResult){
    echo "<p> There was a problem with data insertion, back and try again later </p>";
} else {
    header("Location: view_available_products.php");
}

}

?>