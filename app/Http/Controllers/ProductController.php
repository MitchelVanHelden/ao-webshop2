<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\products;

    class ProductController extends Controller{
    public function index(){
        $products = products::All();
        return view('products.index', ['products' => $products]);
    }
    public function display($id){
        $products = products::findOrFail($id);
        return view('products.product_details', compact('products'));
    }

}
