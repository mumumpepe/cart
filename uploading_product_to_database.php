<?php
include("db_connection.php");

//variables declaration & assing values
$productName = $_POST["productName"];
$productPicture = $_POST["productPicture"];
$unityPrice = $_POST["unityPrice"];
$description = $_POST["description"];
$discontPercentage = $_POST["discount"];

if(!isset($productName) || !isset($productPicture) || !isset($unityPrice) || !isset($description)){
    echo "<p>Not all the blanks were filled, Please go back and try again </p>";
}

$query = "INSERT INTO product_details (product_name, product_picture, unity_price, product_description, discount_percentage) 
        VALUES ('".$productName."', '".$productPicture."', '".$unityPrice."', '".$description."', '".$discontPercentage."')";
$result = $conn->query($query);

if (!$result){
    echo "<p> There was an error with adding your product to our database, please try agin later or contact support for help </p>";
   die("Query failed: ". $conn->error);
} else {
    header("Location: upload_product_details.php");
}

?>