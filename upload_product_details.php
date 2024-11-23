<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Product Details</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">
    <!-- Page Container -->
    <div class="container mx-auto p-6">
        <!-- Header -->
        <h1 class="text-4xl font-bold text-blue-600 text-center mb-8">MUMUMPEPE'S CART</h1>
        <h2 class="text-2xl font-semibold text-gray-700 mb-6 text-center">Product Details</h2>

        <!-- Form -->
        <form action="uploading_product_to_database.php" method="post" class="bg-white shadow rounded-lg p-6 max-w-lg mx-auto">
            <div class="space-y-4">
                <!-- Product Name -->
                <div>
                    <label for="productName" class="block text-sm font-medium text-gray-700">Product Name</label>
                    <input 
                        type="text" 
                        id="productName" 
                        name="productName" 
                        class="w-full border border-gray-300 rounded px-4 py-2 mt-1"
                        placeholder="e.g., Washing Machine"
                        required
                    >
                </div>

                <!-- Product Picture -->
                <div>
                    <label for="productPicture" class="block text-sm font-medium text-gray-700">Product Picture</label>
                    <input 
                        type="text" 
                        id="productPicture" 
                        name="productPicture" 
                        class="w-full border border-gray-300 rounded px-4 py-2 mt-1"
                        placeholder="e.g., Link to the product's picture"
                        required
                    >
                </div>

                <!-- Unity Price -->
                <div>
                    <label for="unityPrice" class="block text-sm font-medium text-gray-700">Unit Price ($)</label>
                    <input 
                        type="number" 
                        id="unityPrice" 
                        name="unityPrice" 
                        class="w-full border border-gray-300 rounded px-4 py-2 mt-1"
                        placeholder="$0.0"
                        required
                    >
                </div>

                <!-- Discount Percentage -->
                <div>
                    <label for="discount" class="block text-sm font-medium text-gray-700">Discount Percentage (%)</label>
                    <input 
                        type="number" 
                        id="discount" 
                        name="discount" 
                        class="w-full border border-gray-300 rounded px-4 py-2 mt-1"
                        placeholder="e.g., 0%"
                        max="100"
                        value="0"
                        required
                    >
                </div>

                <!-- Description -->
                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                    <textarea 
                        id="description" 
                        name="description" 
                        class="w-full border border-gray-300 rounded px-4 py-2 mt-1"
                        placeholder="Describe the product in detail"
                        rows="4"
                        required
                    ></textarea>
                </div>

                <!-- Save Button -->
                <div class="text-center">
                    <button 
                        type="submit" 
                        class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700 transition">
                        Save Product
                    </button>
                </div>
            </div>
        </form>
    </div>
</body>
</html>
