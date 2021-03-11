<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;


class CategoryController extends Controller
{
   public function categories()
   {
        $categories = Category::with('products','children','parent')->get()->toArray();

        return response()->json($categories);
   }

   public function category($slug)
   {
        $category = Category::where('slug', $slug)->with('products','parent', 'children')->get()->toArray();
        return response()->json($category);
   }
}
