<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use function Laravel\Prompts\search;

class OrderController extends Controller
{
    public function addOrder(OrderRequest $request){
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
    public function orderShow(){
       $orders=Order::all();
       return view('admin.Orders.all_orders',compact('orders'));

    }
    public function onWay($id){
        $order=Order::find($id);
        $order->status='on the way';
        $order->save();
        return redirect()->back();

    }
    public function delivered($id){
        $order=Order::find($id);
        $order->status='delivered';
        $order->save();
        return redirect()->back();
    }
    public function printPdf($id){
        $order=Order::find($id);
        $pdf = Pdf::loadView('admin.Orders.invoice',compact('order'));
        return $pdf->download('invoice.pdf');

    }
}
