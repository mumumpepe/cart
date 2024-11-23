<?php
include("db_connection.php");
include("cart_naming.php");

// Retrieve rows from the cart table
$query = "SELECT * FROM $tableName GROUP BY product_id";
$result = $conn->query($query);

if (!$result) {
    echo "<p> There was a problem with obtaining products from the database. Please try again later. </p>";
    exit();
}

// Fetch data into an array
$fetchedData = array();
while ($row = $result->fetch_assoc()) {
    $fetchedData[] = $row;
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List of Products & Payment</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">

    <!-- Page Container -->
    <div class="container mx-auto p-6">
        <!-- Header -->
        <h1 class="text-3xl font-bold text-blue-600 mb-6">Product List & Payment</h1>

        <!-- Product Table -->
        <div class="bg-white shadow rounded-lg p-6">
            <h2 class="text-xl font-semibold text-gray-700 mb-4">Products in Your Cart</h2>
            <?php if (!empty($fetchedData)): ?>
            <div class="overflow-x-auto">
                <table class="table-auto w-full border-collapse border border-gray-300">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="border border-gray-300 px-4 py-2">Product ID</th>
                            <th class="border border-gray-300 px-4 py-2">Product Name</th>
                            <th class="border border-gray-300 px-4 py-2">Product Image</th>
                            <th class="border border-gray-300 px-4 py-2">Unit Price</th>
                            <th class="border border-gray-300 px-4 py-2">Discount (%)</th>
                            <th class="border border-gray-300 px-4 py-2">New Price</th>
                            <th class="border border-gray-300 px-4 py-2">Amount</th>
                            <th class="border border-gray-300 px-4 py-2">Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($fetchedData as $row): ?>
                        <tr class="hover:bg-gray-100">
                            <td class="border border-gray-300 px-4 py-2"><?php echo htmlspecialchars($row["product_id"]); ?></td>
                            <td class="border border-gray-300 px-4 py-2"><?php echo htmlspecialchars($row["product_name"]); ?></td>
                            <td class="border border-gray-300 px-4 py-2">
                                <img src="<?php echo htmlspecialchars($row["product_image"]); ?>" alt="Product Image" class="w-20 h-20 object-cover rounded">
                            </td>
                            <td class="border border-gray-300 px-4 py-2"><?php echo htmlspecialchars($row["unity_price"]); ?> $</td>
                            <td class="border border-gray-300 px-4 py-2"><?php echo htmlspecialchars($row["discount_percentage"]); ?>%</td>
                            <td class="border border-gray-300 px-4 py-2"><?php echo htmlspecialchars($row["new_price"]); ?> $</td>
                            <td class="border border-gray-300 px-4 py-2"><?php echo htmlspecialchars($row["amount"]); ?></td>
                            <td class="border border-gray-300 px-4 py-2"><?php echo htmlspecialchars($row["subtotal"]); ?> $</td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <?php else: ?>
            <p class="text-red-500 font-semibold">No products found in your cart.</p>
            <?php endif; ?>
        </div>

        <!-- Payment Methods -->
        <div class="bg-white shadow rounded-lg p-6 mt-6">
            <h2 class="text-xl font-semibold text-gray-700 mb-4">Supported Payment Methods</h2>
            <ul class="list-disc list-inside text-gray-700">
                <li>MPESA</li>
                <li>TIGO PESA</li>
                <li>AIRTEL MONEY</li>
                <li>HALOPESA</li>
                <li>CRDB</li>
                <li>NMB</li>
                <li>NBC</li>
            </ul>
        </div>

        <!-- Contact Form -->
        <div class="bg-white shadow rounded-lg p-6 mt-6">
            <h2 class="text-xl font-semibold text-gray-700 mb-4">Contact Information</h2>
            <p class="text-gray-600 mb-4">Please leave us your contact details so we can reach out to you easily:</p>
            <form action="#" method="POST" class="space-y-4">
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input 
                        type="email" 
                        id="email" 
                        name="email" 
                        class="w-full border border-gray-300 rounded px-4 py-2"
                        placeholder="Enter your email" 
                        required
                    >
                </div>
                <div>
                    <label for="mobile" class="block text-sm font-medium text-gray-700">Mobile No</label>
                    <input 
                        type="text" 
                        id="mobile" 
                        name="mobile" 
                        class="w-full border border-gray-300 rounded px-4 py-2"
                        placeholder="Enter your mobile number" 
                        required
                    >
                </div>
                <button 
                    type="submit" 
                    class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700 transition">
                    Submit
                </button>
            </form>
        </div>
    </div>

</body>
</html>
