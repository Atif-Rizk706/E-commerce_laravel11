<?php

namespace App\Http\Controllers;

use App\Models\Category;
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
}
