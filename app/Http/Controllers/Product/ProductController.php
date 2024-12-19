<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use function Laravel\Prompts\search;

class ProductController extends Controller
{
    use ImageUploadTrait;
    public function productDetails($id){
        $product=Product::find($id);
        $user_id=Auth::id();
        $count=Cart::where('user_id',$user_id)->count();
        return view('home.product.product_details',compact('product','count'));

    }
    public function addProduct(){
        $categories=Category::all();
        return view('admin.Product.add_product',compact('categories'));
    }
    public function saveProduct(ProductRequest $request){

        $imagePath = $this->saveImage($request,$folder='products'); // Use the trait method
        $product = Product::create([
            'title' => $request->validated()['title'],  // Access validated data
            'description' => $request->validated()['description'],
            'image' => $imagePath ?? null,  // Store the image path if available
            'price' => $request->validated()['price'],
            'category' => $request->validated()['category'],
            'quantity' => $request->validated()['quantity'],
        ]);
        toastr()->timeOut(1000)->closeButton()->addSuccess('Product saved Successfully');

        return redirect()->back();
    }
    public function showProduct(){
        $products=Product::paginate(4);
        return view('admin.show_products',compact('products'));
    }
    public function deleteProduct($id){
        $product=Product::find($id);
        $product->delete();
        if ($product->image) {
            Storage::delete('public/' . $product->image); // Assuming image is stored in the public disk
        }
        toastr()->timeOut(1000)->closeButton()->addSuccess('Product deleted Successfully');
        return redirect()->back();


    }
    public function editeProduct($id){
        $categories=Category::all();
        $product=Product::find($id);
        return view('admin.edite_product',compact('product','categories'));
    }
    public function updateProduct(Request $request,$id){

        $product=Product::find($id);
        $product->title=$request->title;
        $product->description=$request->description;
        $product->price=$request->price;
        $product->category=$request->category;
        $product->quantity=$request->quantity;

        $imagePath = $this->saveImage($request,$folder='products'); // Use the trait method
        $product->image=$imagePath;
        $product->save();
        toastr()->timeOut(1000)->closeButton()->addSuccess('Product Updated Successfully');
        return redirect()->back();
    }
    public function searchProduct(Request $request){
        $search=$request->search;
        $products=Product::where('title','LIKE','%'.$search.'%')->orWhere('category','LIKE','%'.$search.'%')->paginate(3);;
        return view('admin.show_products',compact('products'));
    }
}
