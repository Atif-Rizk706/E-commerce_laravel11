<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use function Laravel\Prompts\search;

class OrderController extends Controller
{
    public function addOrder(Request $request){
        $user_id=Auth::id();
        $cart=Cart::where('user_id',$user_id)->get();
        foreach ($cart as $carts){
            $order=new Order();
            $order->name=$request->name;
            $order->rec_address=$request->address;
            $order->rec_phone=$request->phone;
            $order->user_id=$user_id;
            $order->product_id=$carts->product_id;
            $order->save();

        }
        foreach ($cart as $cart_re){
            $cart_re->delete();
        }
        toastr()->timeOut(1000)->closeButton()->addSuccess('order place  Successfully');
        return redirect()->back();



    }
}
