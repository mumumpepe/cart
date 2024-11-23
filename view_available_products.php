<?php
include("db_connection.php");
include("cart_naming.php");

//query to check if table is exists so as to count
$existQuery = "SELECT * FROM $tableName;";
$existResult = $conn->query($existQuery);

//global variable later to be be size of the cart
$cartSize = 0;

//if table is already created count query to execute
if($existResult){
//retrieving data from the cart table
$cartSizeQuery = "SELECT COUNT(DISTINCT(product_id)) as cart_size FROM $tableName";
$cartSizeResult = $conn->query($cartSizeQuery);

//get an answer form query
$cartSizeRow = $cartSizeResult->fetch_assoc();
$cartSize = $cartSizeRow["cart_size"];

if(!$cartSizeResult){
    echo "<p> There was an issue with looking in the cart, please try again later </p>";

}
}



//Data retrival form the table product_details
$query = "SELECT * FROM product_details";
$result = $conn->query($query);

//checking if result was ok
if (!$result){
    echo "<p> There was a problem with query execution at database, please try again later </p>";
}

//fetching row and storing its values in an array
$fetchedData = array();
while($row = $result->fetch_assoc()){
    $fetchedData[] = $row;
}

//counting number of returned rows
// $num_results = $result->num_rows;
// echo " Total number of products in the stock is: " . $num_results;


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Products</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800 font-sans">
    <!-- Header -->
    <header class="bg-blue-600 text-white py-4 shadow-lg">
        <h1 class="text-center text-2xl font-bold">Get Anything From Here</h1>
    </header>

    <!-- Search Form -->
    <div class="container mx-auto mt-6 p-4 bg-white shadow rounded">
        <form action="search_indexing.php" method="post" class="flex flex-col md:flex-row items-center gap-4">
            <label for="searching" class="font-semibold text-lg">Search here:</label>
            <input 
                type="text" 
                name="search" 
                placeholder="Enter the product name" 
                class="flex-1 p-2 border rounded shadow focus:outline-none focus:ring focus:ring-blue-300"
            >
            <button 
                type="submit" 
                class="bg-blue-600 text-white py-2 px-6 rounded hover:bg-blue-700 transition">
                Search
            </button>
        </form>
    </div>

    <div class="container mx-auto mt-6 bg-white shadow-lg rounded-lg p-6">
    <h2 class="text-2xl font-extrabold text-blue-600 mb-4">Search Results</h2>

    <?php 
    // counting number of returned rows
    $num_results = $result->num_rows;
    echo "<p class='text-md font-semibold text-gray-700 mb-6'>Total number of products in stock: <span class='text-blue-600'>$num_results</span></p>"; 
    ?>

    <div class="overflow-x-auto">
        <table class="table-auto w-full border-collapse border border-gray-300 bg-gray-50 text-gray-800">
            <thead>
                <tr class="bg-blue-100 text-blue-800">
                    <th class="border border-gray-300 px-6 py-3 text-left font-semibold">Product ID</th>
                    <th class="border border-gray-300 px-6 py-3 text-left font-semibold">Product Name</th>
                    <th class="border border-gray-300 px-6 py-3 text-left font-semibold">Product Image</th>
                    <th class="border border-gray-300 px-6 py-3 text-left font-semibold">Unit Price</th>
                    <th class="border border-gray-300 px-6 py-3 text-left font-semibold">Discount (%)</th>
                    <th class="border border-gray-300 px-6 py-3 text-left font-semibold">Description</th>
                    <th class="border border-gray-300 px-6 py-3 text-left font-semibold">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($fetchedData as $row): ?>
                <tr class="hover:bg-gray-100">
                    <td class="border border-gray-300 px-6 py-4"><?php echo $row["product_id"]; ?></td>
                    <td class="border border-gray-300 px-6 py-4"><?php echo $row["product_name"]; ?></td>
                    <td class="border border-gray-300 px-6 py-4">
                        <img src="<?php echo $row["product_picture"]; ?>" alt="Product Image" class="w-24 h-24 object-cover rounded-md shadow-md">
                    </td>
                    <td class="border border-gray-300 px-6 py-4"><?php echo $row["unity_price"]; ?> $</td>
                    <td class="border border-gray-300 px-6 py-4"><?php echo $row["discount_percentage"]; ?>%</td>
                    <td class="border border-gray-300 px-6 py-4"><?php echo $row["product_description"]; ?></td>
                    <td class="border border-gray-300 px-6 py-4">
                        <form action="add_cart.php" method="POST">
                            <input type="hidden" name="extracted_id" value="<?php echo $row["product_id"]; ?>">
                            <button 
                                type="submit" 
                                class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 transition-shadow shadow-md">
                                Add to Cart
                            </button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>


    <!-- Footer / Checkout -->
    <footer class="bg-gray-800 text-white py-4 mt-6">
        <div class="container mx-auto flex justify-between items-center">
            <form action="check_out.php" class="flex items-center gap-4">
                <label for="size-of-cart" class="font-semibold">Things in the cart:</label>
                <input 
                    type="text" 
                    name="productId" 
                    value="<?php echo $cartSize; ?>" 
                    readonly 
                    class="p-2 rounded text-gray-700">
                <button 
                    type="submit" 
                    class="bg-blue-600 text-white py-2 px-6 rounded hover:bg-blue-700 transition">
                    Checkout
                </button>
            </form>
            <p class="text-sm">&copy; 2024 Your Company Name</p>
        </div>
    </footer>
</body>
</html>
