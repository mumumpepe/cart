<?php
include("db_connection.php");

$productName = $_POST["search"] ?? '';

// Retrieving rows from the table `product_details`
$query = "SELECT * FROM product_details WHERE product_name LIKE '%" . $conn->real_escape_string($productName) . "%'";
$result = $conn->query($query);

// Fetch and store data in an array
$fetchedData = array();
if ($result) {
    while ($row = $result->fetch_assoc()) {
        $fetchedData[] = $row;
    }
} else {
    echo "<p class='text-red-600'>There was a problem with the data retrieval. Please try again later.</p>";
}

// Get number of returned rows
$num_results = $result ? $result->num_rows : 0;
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Result</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">

    <div class="container mx-auto p-6">
        <!-- Search Form -->
        <div class="bg-white shadow rounded-lg p-6 mb-6">
            <h1 class="text-2xl font-bold text-blue-600 mb-4">Search Products</h1>
            <form action="search_indexing.php" method="post" class="flex gap-4">
                <input 
                    type="text" 
                    name="search" 
                    placeholder="Enter the name of the product" 
                    class="border border-gray-300 rounded px-4 py-2 w-full"
                    value="<?php echo htmlspecialchars($productName); ?>"
                >
                <button 
                    type="submit" 
                    class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700 transition">
                    Search
                </button>
            </form>
        </div>

        <!-- Search Results -->
        <div class="bg-white shadow rounded-lg p-6">
            <h2 class="text-xl font-semibold text-gray-700 mb-4">
                <?php echo $num_results > 0 ? "Found $num_results matching products:" : "No products found"; ?>
            </h2>
            <?php if ($num_results > 0): ?>
            <div class="overflow-x-auto">
                <table class="table-auto w-full border-collapse border border-gray-300">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="border border-gray-300 px-4 py-2">Product ID</th>
                            <th class="border border-gray-300 px-4 py-2">Product Name</th>
                            <th class="border border-gray-300 px-4 py-2">Product Image</th>
                            <th class="border border-gray-300 px-4 py-2">Unit Price</th>
                            <th class="border border-gray-300 px-4 py-2">Description</th>
                            <th class="border border-gray-300 px-4 py-2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($fetchedData as $row): ?>
                        <tr class="hover:bg-gray-100">
                            <td class="border border-gray-300 px-4 py-2"><?php echo htmlspecialchars($row["product_id"]); ?></td>
                            <td class="border border-gray-300 px-4 py-2"><?php echo htmlspecialchars($row["product_name"]); ?></td>
                            <td class="border border-gray-300 px-4 py-2">
                                <img src="<?php echo htmlspecialchars($row["product_picture"]); ?>" 
                                     alt="Product Image" 
                                     class="w-20 h-20 object-cover rounded">
                            </td>
                            <td class="border border-gray-300 px-4 py-2"><?php echo htmlspecialchars($row["unity_price"]); ?> $</td>
                            <td class="border border-gray-300 px-4 py-2"><?php echo htmlspecialchars($row["product_description"]); ?></td>
                            <td class="border border-gray-300 px-4 py-2">
                                <form action="add_cart.php" method="POST">
                                    <input type="hidden" name="extracted_id" value="<?php echo htmlspecialchars($row["product_id"]); ?>">
                                    <button 
                                        type="submit" 
                                        class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 transition">
                                        Add to Cart
                                    </button>
                                </form>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <?php endif; ?>
        </div>

        <!-- Checkout Button -->
        <div class="text-right mt-6">
            <form action="checkout.php" method="post">
                <button 
                    
                    class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700 transition">
                    Checkout
                </button>
            </form>
        </div>
    </div>

</body>
</html>
