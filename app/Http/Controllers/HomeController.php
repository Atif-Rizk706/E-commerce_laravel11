<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){
        $users=User::where('usertype','user')->get()->count();
        $orders=Order::all()->count();
        $products=Product::all()->count();
        $orders_delivered=Order::where('status','delivered')->get()->count();

        return view('admin.index',compact('users','products','orders','orders_delivered'));
    }
    public function home(){
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



}
