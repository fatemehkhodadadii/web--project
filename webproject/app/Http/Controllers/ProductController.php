<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Comment;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Support\Facades\DB;
use Session;

class ProductController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth')->except('index', 'product', 'search', 'removeCart');
	}

    function index(){
        $data = Product::all();
        return view('product',['products'=>$data]);
    }

    function product($id){
        $product = Product::find($id);
        $comments = Comment::getByProductId($id)->with('user')->get();
        return view('detail', compact('product', 'comments'));
    }

    function search(Request $req){
        $data = Product::where('name','like', '%'.$req->input('query').'%')->get();
        return view('search', ['products'=>$data]);     
    }
    
    function addToCart(Request $req){
		$cart = new Cart;
		$cart->user_id = auth()->id();
		$cart->product_id = $req->product_id;
		$cart->save();     
		return redirect('/');
    }

    static function cartItem(){
        $user_id = auth()->id();
        return Cart::where('user_id', $user_id)->count();
    }

    function cartList(){
        $user_id = auth()->id();
        $result = DB::table('carts')
        ->join('products', 'carts.product_id', 'products.id')
        ->select('products.*', 'carts.id as cart_id')
        ->where('carts.user_id', $user_id)
        ->get();
        return view('cartlist', ['products'=>$result]);
    }

    function removeCart($id){
        Cart::destroy($id);
        return redirect('/cart_list');
    }

    function orderNow(){
        $user_id = auth()->id();
        $result = DB::table('carts')
			->join('products', 'carts.product_id', 'products.id')
			->where('carts.user_id', $user_id)
			->sum('products.price');
        return view('ordernow', ['total'=>$result]);
        // return $result;
    }

    function orderPlace(Request $req){
        $user_id = auth()->id();
        $allCart = Cart::where('user_id', $user_id)->get();
        foreach($allCart as $cart){
            $order = new Order;
            $order->product_id = $cart['product_id'];
            $order->user_id = $cart['user_id'];
            $order->address = $req->address;
            $order->status = "Pending";
            $order->payment_method = $req->payment;
            $order->payment_status = "در انتظار پرداخت";
            $order->save();
        }
        Cart::where('user_id', $user_id)->delete();
        return redirect('/');
    }

    function myOrder(){
        $user_id = auth()->id();
        $result = DB::table('orders')
        ->join('products', 'orders.product_id', 'products.id')
        ->where('orders.user_id', $user_id)
        ->get();
        return view('myorder', ['orders'=>$result]);
        // return $result;
    }
}
