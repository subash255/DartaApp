<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $categories=Category::all();
        return view('admin.category.index',compact('categories'),[
            'title'=>'Category List'
        ]);
    }
   

    public function store(Request $request)
{
    // Validate the incoming request
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
    ]);

    $category = Category::create([
        'name' => $validatedData['name'],
    ]);

    return redirect()->route('admin.category.index')->with('success', 'Category added successfully!');
}

public function update(Request $request, $id)
{
    // Validate the incoming request
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
    ]);

    // Find the category by its ID
    $category = Category::findOrFail($id);

    // Update the category's name
    $category->name = $validatedData['name'];
    $category->save();

    // Redirect back with success message
    return redirect()->route('admin.category.index')->with('success', 'Category updated successfully!');
}
public function delete($id)
{
    $category=Category::findOrFail($id);
    $category->delete();
    return redirect()->back()->with('success','Category deleted successfully');
}

}
