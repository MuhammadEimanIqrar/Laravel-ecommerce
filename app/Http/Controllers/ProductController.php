<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;

class ProductController extends Controller
{
    function detail($id) 
    {
        $data = Product::find($id);
        return view('Inner Pages.ProductDetail', ['product' => $data]);
    }

    function AddToCart (Request $req) 
    {
        if ($req->session()->has('user')) 
        {
            $cart = new cart();
            $cart-> user_id = $req->session()->get('user')['id'];
            $cart-> product_id = $req-> product_id;
            $cart-> save();
            return redirect('/');
        }
        else 
        {
            return redirect('/login');
        }
    }

    static function CartItems () 
    {
        $userId = Session::get('user')['id'];
        return Cart::where('user_id', $userId)->count();
    }

    function cartList () 
    {
        $userId = Session::get('user')['id'];
        $products = DB::table('cart')
        ->join('products', 'cart.product_id', '=', 'products.id', )
        ->where('cart.user_id', $userId)
        ->select('products.*', 'cart.id as cart_id')
        ->get();

        return view('Inner Pages.cartList', ['products' => $products]);
    }

    function removeCartItem ($id) 
    {
        Cart::destroy($id);
        return redirect('/cartList');
    }

    function orderNow () 
    {
        if (Session::has('user')) {
            $userId = Session::get('user')['id'];
            $total_Price = DB::table('cart')
            ->join('products', 'cart.product_id', '=', 'products.id', )
            ->where('cart.user_id', $userId)
            ->select('products.*', 'cart.id as cart_id')
            ->sum('products.price');

            return view('Inner Pages.OrderForm', ['total_Price' => $total_Price]);
        }
        else {
            return redirect('/login');
        }
    }

    function orderPlace (Request $req) 
    {
        if ($req->session()->has('user'))
        {
            $userId = Session::get('user')['id'];
            $allCart = Cart::where('user_id', $userId)->get();
            foreach ($allCart as $cart)
            {
                $order = new Order;
                $order->product_id=$cart['product_id'];
                $order->user_id=$cart['user_id'];
                $order->status="pending";
                $order->payment_method=$req->payment;
                $order->payment_status="pending";
                $order->address=$req->address;
                $order->save();
                $allCart = Cart::where('user_id', $userId)->delete();
            }
            return redirect('/');
        }
        else {
            return redirect('/login');
        }
    }

    function orders () 
    {
        $userId = Session::get('user')['id'];
        $orders = DB::table('orders')
        ->join('products', 'orders.product_id', '=', 'products.id', )
        ->where('orders.user_id', $userId)
        ->get();

        return view('Inner Pages.orders', ['orders' => $orders]);
    }

    function search (Request $req)
    {
        $data = Product::where('name', 'like', '%'.$req->input('query').'%')
        ->get();

        return view('Inner Pages.search', ['products' => $data]);
    }

}
