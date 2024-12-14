<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){
        return view('admin.index');
    }
    public function home(){
        $products=Product::all();
        $products=Product::all();
        $user_id=Auth::id();
        $count=Cart::where('user_id',$user_id)->count();
        return view('home.index',compact('products','count'));
    }
    public function login_in(){
        $products=Product::all();
        $user_id=Auth::id();
        $count=Cart::where('user_id',$user_id)->count();
        return view('home.index',compact('products','count'));
    }
   public function productDetails($id){
        $product=Product::find($id);
       $user_id=Auth::id();
       $count=Cart::where('user_id',$user_id)->count();
        return view('home.product_details',compact('product','count'));

   }
   public function addCard($id){
        $product_id=$id;
        $user=Auth::user();
        $user_id=$user->id;
        $cart=new Cart();
        $cart->user_id=$user_id;
        $cart->product_id=$product_id;
        $cart->save();
        toastr()->timeOut(1000)->closeButton()->addSuccess('Product Added to your Cart Successfully');
        return redirect()->back();

   }
   public function showCard(){
       $user_id=Auth::id();
       $count=Cart::where('user_id',$user_id)->count();
       $cart=Cart::where('user_id',$user_id)->get();

       return view('home.mycard',compact('count','cart'));

   }
}
