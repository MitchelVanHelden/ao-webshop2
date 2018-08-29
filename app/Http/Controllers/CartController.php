<?php

namespace App\Http\Controllers;

use App\Order;
use App\products;
use App\ShoppingCart;
use Session;
use Illuminate\Http\Request;
use Auth;

class CartController extends Controller
{
        public function addProduct(Request $request, $id)
    {
        $product = products::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new ShoppingCart($oldCart);
        $cart->add($product, $product->id);

        $request->session()->put('cart', $cart);
        //dd($request->session()->get('cart'));
        return redirect()->route('product.index');
    }

        public function getReduceByOne($id) {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new ShoppingCart($oldCart);
        $cart->reduceByOne($id);
        if (count($cart->items) > 0) {
            Session::put('cart', $cart);
        } else {
            Session::forget('cart');
        }
        return redirect()->route('cart.getCart');
    }

    public function getRemoveItem($id)
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new ShoppingCart($oldCart);
        $cart->removeItem($id);
        if (count($cart->items) > 0) {
            Session::put('cart', $cart);
        } else {
            Session::forget('cart');
        }
        return redirect()->route('cart.getCart');
    }

    
     public function getCart(){
        if (!Session::has('cart')) {
            return view('cart.index');
        }
        $oldCart = Session::get('cart');
        $cart = new ShoppingCart($oldCart);
        return view('cart.index', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice]);
    }
	public function getCheckout() {
        if (!Session::has('cart')) {
            return view('cart.index');
        }
        $oldCart = Session::get('cart');
        $cart = new ShoppingCart($oldCart);
        $total = $cart->totalPrice;
        return view('cart.checkout' , ['total' => $total]);
    }
     public function postCheckout(Request $request){
        if (!Session::has('cart')) {
            return redirect()->route('cart.index');
        }
        $oldCart = Session::get('cart');
        $cart = new ShoppingCart($oldCart);
        $order = new Order();
        $order->cart = serialize($cart);
        $order->address = $request->input('address');
        $order->name = $request->input('name');
        Auth::user()->orders()->save($order);
        Session::forget('cart');
        return redirect()->route('product.index')->with('success', 'Successfully purchased products!');
    }
     public function GetProfile(){
        $orders = Auth::user()->orders;
        $orders->transform(function ($order, $key) {
            $order->cart = unserialize($order->cart);
            return $order;
        });
        return view('user.profile', ['orders' => $orders]);
    }
}
