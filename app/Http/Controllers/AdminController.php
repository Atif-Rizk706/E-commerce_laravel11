<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function viewCategory(){
        return view('admin.category');
    }
    public function addCategory(Request $request){
        $category=new Category();
        $category->category_name=$request->category;
        $category->save();
        toastr()->timeOut(1000)->closeButton()->addSuccess('Category Add Successfully');

        return redirect()->back();

    }
    public function allCategory(){
        $categories=Category::all();
        return view('admin.manage_category',compact('categories'));
    }
    public function deleteCategory($id){
        $category=Category::find($id);
        $category->delete();
        toastr()->timeOut(1000)->closeButton()->addSuccess('Category delete Successfully');
        return redirect()->back();
    }
    public function editeCategory($id){
        $category=Category::find($id);
        return view('admin.editeCategory',compact('category'));

    }
    public function updateCategory(Request $request,$id){
        $category=Category::find($id);
        $category->category_name=$request->category;
        $category->save();
        toastr()->timeOut(1000)->closeButton()->addSuccess('Category updated Successfully');
        return redirect()->back();

    }
    public function addProduct(){
        $categories=Category::all();
        return view('admin.add_product',compact('categories'));
    }
    public function saveProduct(Request $request){
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'price' => 'required|numeric',
            'category' => 'required|string',
            'quantity' => 'required|integer|min:1',
        ]);
        if ($request->hasFile('image')) {
            // Store the image in the 'public/products' folder and get the path
            $imagePath = $request->file('image')->store('products', 'public');
        }
        $product = Product::create([
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'image' => $imagePath ?? null,  // Store the image path if available
            'price' => $validatedData['price'],
            'category' => $validatedData['category'],
            'quantity' => $validatedData['quantity'],
        ]);
        toastr()->timeOut(1000)->closeButton()->addSuccess('Product saved Successfully');

        return redirect()->back();
    }
}
