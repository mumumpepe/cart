<?php
$hostName = "localhost";
$userName = "root";
$password = "";
$databaseName = "cartdevelopment";

//establishing a database connection
$conn = new mysqli($hostName, $userName, $password, $databaseName);

if(mysqli_connect_errno()){
    echo "<p>Error: There was an error with the database connection <br/>
    Please try again later </p>";
    exit;
}
?>