<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Management</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .btn {
            padding: 8px 16px;
            margin-bottom: 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
        .btn:hover {
            background-color: #45a049;
        }
        .action-btn {
            color: #007bff;
            cursor: pointer;
            text-decoration: none;
            margin-right: 10px;
        }
    </style>
</head>
<body>

    <h1>Product Management</h1>
    
    <!-- Button to Add New Product -->
    <a href="{{ route('products.create') }}" class="btn btn-primary">Add a New Product</a>

    <!-- Table to Display Products -->
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Category</th>
                <th>Model</th>
                <th>Price</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <!-- Example Product Rows -->
            @foreach($products as $product)
                    <tr>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->category }}</td>
                        <td>{{ $product->model }}</td>
                        <td>${{ $product->price }}</td>
                        <td>
                        <a href="{{ route('products.edit', $product->id) }}" class="action-btn">Edit</a>

                        <!-- Delete Form -->
                        <form action="{{ route('delete', $product->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="delete-btn">Delete</button>
                        </form>
                        </td>
                    </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>
