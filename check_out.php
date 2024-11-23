<?php
include("db_connection.php");
include("cart_naming.php");
include("update_columns.php");

// Query to retrieve rows from the cart table
$query = "SELECT * FROM $tableName GROUP BY product_id";
$result = $conn->query($query);

// Fetch data into an array
$fetchedData = array();
if ($result) {
    while ($row = $result->fetch_assoc()) {
        $fetchedData[] = $row;
    }
}

// Calculate the total sum of the cart
$sumCart = "SELECT SUM(DISTINCT(subtotal)) as subtotal FROM $tableName";
$sumResult = $conn->query($sumCart);
$realSum = $sumResult && $sumResult->num_rows > 0 ? $sumResult->fetch_assoc()["subtotal"] : 0;
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart Summary</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">

    <div class="container mx-auto p-6">
        <!-- Cart Label -->
        <div class="bg-white shadow rounded-lg p-6 mb-6">
            <h1 class="text-2xl font-bold text-blue-600 mb-4">Cart Summary</h1>
            <p class="text-lg font-semibold text-gray-700">Cart Label: <span class="text-blue-500"><?php echo htmlspecialchars($tableName); ?></span></p>
        </div>

        <!-- Cart Items Table -->
        <div class="bg-white shadow rounded-lg p-6">
            <?php if (!empty($fetchedData)): ?>
            <div class="overflow-x-auto">
                <table class="table-auto w-full border-collapse border border-gray-300">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="border border-gray-300 px-4 py-2">Product Name</th>
                            <th class="border border-gray-300 px-4 py-2">Product Image</th>
                            <th class="border border-gray-300 px-4 py-2">Unit Price</th>
                            <th class="border border-gray-300 px-4 py-2">Discount (%)</th>
                            <th class="border border-gray-300 px-4 py-2">New Price</th>
                            <th class="border border-gray-300 px-4 py-2">Amount</th>
                            <th class="border border-gray-300 px-4 py-2">Subtotal</th>
                            <th class="border border-gray-300 px-4 py-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($fetchedData as $row): ?>
                        <tr class="hover:bg-gray-100">
                            <td class="border border-gray-300 px-4 py-2"><?php echo htmlspecialchars($row["product_name"]); ?></td>
                            <td class="border border-gray-300 px-4 py-2">
                                <img src="<?php echo htmlspecialchars($row["product_image"]); ?>" alt="Product Image" class="w-20 h-20 object-cover rounded">
                            </td>
                            <td class="border border-gray-300 px-4 py-2"><?php echo htmlspecialchars($row["unity_price"]); ?> $</td>
                            <td class="border border-gray-300 px-4 py-2"><?php echo htmlspecialchars($row["discount_percentage"]); ?>%</td>
                            <td class="border border-gray-300 px-4 py-2"><?php echo htmlspecialchars($row["new_price"]); ?> $</td>
                            <td class="border border-gray-300 px-4 py-2"><?php echo htmlspecialchars($row["amount"]); ?></td>
                            <td class="border border-gray-300 px-4 py-2"><?php echo htmlspecialchars($row["subtotal"]); ?> $</td>
                            <td class="border border-gray-300 px-4 py-2">
                                <form action="delete_product.php" method="POST" class="inline">
                                    <input type="hidden" name="productId" value="<?php echo htmlspecialchars($row["product_id"]); ?>">
                                    <button 
                                        type="submit" 
                                        class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700 transition">
                                        Remove
                                    </button>
                                </form>
                                <form action="amount_adjustment.php" method="POST" class="inline ml-2">
                                    <input 
                                        type="number" 
                                        name="adjustedAmount" 
                                        placeholder="<?php echo htmlspecialchars($row["amount"]); ?>" 
                                        class="border border-gray-300 rounded px-2 py-1 w-20"
                                    >
                                    <input type="hidden" name="product_identity" value="<?php echo htmlspecialchars($row["product_id"]); ?>">
                                    <button 
                                        type="submit" 
                                        class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                                        Update
                                    </button>
                                </form>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <?php else: ?>
            <p class="text-red-500 font-semibold">Your cart is empty. Add some products!</p>
            <?php endif; ?>
        </div>

        <!-- Total and Actions -->
        <div class="bg-white shadow rounded-lg p-6 mt-6">
            <div class="flex justify-between items-center">
                <div>
                    <h2 class="text-lg font-semibold text-gray-700">Main Total:</h2>
                    <p class="text-xl font-bold text-blue-600"><?php echo htmlspecialchars($realSum); ?> $</p>
                </div>
                <div>
                    <a href="view_available_products.php" class="bg-gray-600 text-white px-6 py-2 rounded hover:bg-gray-700 transition">Go Back</a>
                    <a href="list_products.php" class="bg-green-600 text-white px-6 py-2 rounded hover:bg-green-700 transition">Proceed to Payment</a>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
