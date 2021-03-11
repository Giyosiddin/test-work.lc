<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function show($category_slug, $slug)
    {
        $product = Product::where('slug',$slug)->with('details')->get()->toArray();
        return response()->json($product);
    }

    public function productFilter(Request $request)
    {

    }
}
