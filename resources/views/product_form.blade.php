<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Product</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .form-container {
            margin: 0 auto;
            border: 1px solid #ddd;
            padding: 20px;
            border-radius: 5px;
            width: 400px;
        }
        .form-container input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .form-container button {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .form-container button:hover {
            background-color: #45a049;
        }
        .back-link {
            display: block;
            margin-top: 20px;
            text-align: center;
            text-decoration: none;
            color: #007bff;
        }
    </style>
</head>
<body>

    <h1>Add a New Product</h1>

    <!-- Form to Add New Product -->
    <div class="form-container">
        <form action="{{ route('products.store') }}" method="POST">
            @csrf <!-- This is important for CSRF protection -->
            <input type="text" name="name" placeholder="Product Name" required>
            <input type="text" name="category" placeholder="Category" required>
            <input type="text" name="model" placeholder="Model" required>
            <input type="number" step="0.01" name="price" placeholder="Price" required>
            <button type="submit">Add Product</button>
        </form>
        <!-- Back link to main page -->
        <a href="index.html" class="back-link">Back to Product List</a>
    </div>

</body>
</html>
