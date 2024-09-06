<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function create()
    {
        return view('product_form');
    }

    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required',
            'category' => 'required',
            'model' => 'required',
            'price' => 'required|numeric',
        ]);

        // Create a new product record
        Product::create($request->all());


        // Redirect with a success message
        return redirect()->route('welcome')
                        ->with('success', 'Product added successfully.');
    }


    public function display()
    {
        // Retrieve all products from the database
        $products = Product::all();
        
        // Pass the products to the view
        return view('welcome', compact('products'));
    }


    public function delete($id)
    {
        // Find the product by its ID
        $product = Product::findOrFail($id);

        // Delete the product
        $product->delete();

        // Redirect with a success message
        return redirect()->route('welcome')
                        ->with('success', 'Product deleted successfully.');
    }


    public function edit($id)
    {
        // Find the product by ID or fail if not found
        $product = Product::findOrFail($id);
        
        // Return the view with the product data
        return view('product_edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        // Validate the request data
        $request->validate([
            'editName' => 'required',
            'editCategory' => 'required',
            'editModel' => 'required',
            'editPrice' => 'required|numeric',
        ]);

        // Find the product by ID or fail if not found
        $product = Product::findOrFail($id);

        // Update the product details
        $product->update([
            'name' => $request->input('editName'),
            'category' => $request->input('editCategory'),
            'model' => $request->input('editModel'),
            'price' => $request->input('editPrice'),
        ]);

        // Redirect with a success message
        return redirect()->route('welcome')->with('success', 'Product updated successfully.');
    }
}
