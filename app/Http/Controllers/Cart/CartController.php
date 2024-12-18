<?php

namespace App\Http\Controllers\Cart;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use function Laravel\Prompts\search;

class CartController extends Controller
{
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

        return view('home.cart.mycard',compact('count','cart'));

    }
}
