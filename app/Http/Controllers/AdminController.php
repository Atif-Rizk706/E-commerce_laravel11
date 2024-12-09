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
        return redirect()->back();

    }
}
