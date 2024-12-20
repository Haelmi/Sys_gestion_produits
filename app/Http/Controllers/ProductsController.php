<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Products;

class ProductsController extends Controller
{
    // create a new product
    public function create_product(Request $request){
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'category_id' => 'required|numeric',
            'image' => 'nullable|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
     
        if($request->hasFile('image'))
        {
        $image = $request->file('image');
        $originalName = $image->getClientOriginalName();
        $path = $image->storeAs('', $originalName, 'public');
        $data['image'] = $path;
        }

        Products::create($data);
        return redirect()->route('products.get_all_products')->with('success', 'Product created successfully');
    }

    // get all products
    public function get_all_products()
    {
        $products = Products::with('category')->orderBy('created_at', 'desc')->paginate(5);
        return view('products', compact('products'));
    }

    // get product by id
    public function get_product_by_id($id)
    {
        $resource = Products::findOrFail($id);
        return response()->json($resource);
    }

    // update a product
    public function update_product(Request $request, $id)
    {
        $resource = Products::findOrFail($id);

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'category_id' => 'required|numeric',
            'image' => 'nullable|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if($request->hasFile('image'))
        {
        $image = $request->file('image');
        $originalName = $image->getClientOriginalName();
        $path = $image->storeAs('', $originalName, 'public');
        $data['image'] = $path;
        }

        $resource->update($data);

        return redirect()->route('products.get_all_products');
    }

    // delete a product
    public function delete_product($id){
        $resource = Products::findOrFail($id);
        $resource->delete();
        return response()->json(['message' => 'Product deleted successfully']);
    }



}
