<?php
include("db_connection.php");

$username = "mumumpepe";

//time stamp declaration
$day = "SELECT day(now());";
$dayResult = $conn->query($day);
if(!$dayResult){
    echo "<p> There was an error in reading the time for cart initiation: day </p>";
}

$dayRow = $dayResult->fetch_assoc();
$fetchedDay = $dayRow["day(now())"];

if (!$dayRow){
    echo "<p> There was an issue with time retrival, please try again later";
}



//month declaration
$month = "SELECT monthname(now());";
$monthResult = $conn->query($month);
if(!$monthResult){
    echo "<p> There was an error in reading the time for cart initiation: month </p>";
}

$monthRow = $monthResult->fetch_assoc();
$fetchedMonth = $monthRow["monthname(now())"];

if (!$monthRow){
    echo "<p> There was an issue with month retrival, please try again later";
}


//year declaration
$year = "SELECT year(now());";
$yearResult = $conn->query($year);
if(!$yearResult){
    echo "<p> There was an error in reading the time for cart initiation: year </p>";
}

$yearRow = $yearResult->fetch_assoc();
$fetchedYear = $yearRow["year(now())"];

if (!$yearRow){
    echo "<p> There was an issue with year retrival, please try again later";
}

$tableName =  $fetchedDay.$fetchedMonth.$fetchedYear.$username;


//table creation if not exists
$table = "CREATE TABLE IF NOT EXISTS $tableName(
    userid int auto_increment primary key,
    product_id int,
    product_name varchar(255),
    product_image varchar(255),
    unity_price int,
    discount_percentage int,
    new_price int,
    amount int,
    subtotal int
    );";
$tableResult = $conn->query($table);

//validation the query execution
if(!$tableResult){
    echo "Error: $conn->error";
    echo "</br>There was a problem with cart table creation please try again later";
}









?>