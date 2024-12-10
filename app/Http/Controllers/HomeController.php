<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view('admin.index');
    }
    public function home(){
        $products=Product::all();
        return view('home.index',compact('products'));
    }
   public function productDetails($id){
        $product=Product::find($id);
        return view('home.product_details',compact('product'));

   }
}
