<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categories;

class CategoriesController extends Controller
{
    // create new category
    public function create_category(Request $request){
        $data = $request->validate([
              'name' => 'required|string|max:255',
        ]);
        Categories::create($data);
        return redirect()->route('categories.get_all_categories')->with('success', 'Category created successfully');
    }

    // get all categories
    public function get_all_categories(Request $request){
        $categories = Categories::all();
        return view('categories', compact('categories'));;
    } 

    // get category by id
    public function get_category_by_id($id)
    {
        $resource = Categories::findOrFail($id);
        return response()->json($resource);
    }

    // update category 
    public function update_category(Request $request, $id){
        $resource = Categories::findOrFail($id);

        $data = $request->validate([
              'name' => 'required|string|max:255',
        ]);

        $resource->update($data);
        return redirect()->route('categories.get_all_categories');
    }

    // delete a category
    public function delete_category($id){
        $resource = Categories::findOrFail($id);
        $resource->delete();
        return response()->json(['message' => 'Category deleted successfully']);
    }
}
