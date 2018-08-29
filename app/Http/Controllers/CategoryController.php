<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\category;
use App\products;

class CategoryController extends Controller
{
   public function index(){
        $categories = category::All();
        return view('categories.index', compact('categories'));
    }
    public function display($id){
        $categories = category::findOrFail($id);
        return view('categories.category_details', compact('categories'));
    }
}
