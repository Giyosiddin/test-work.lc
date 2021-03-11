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
        $categories = $request->category;

        $product = Product::query();
        if(isset($categories)){
        $product = $product->whereIn('category_id', $categories);
        }
        if(isset($request->details)){
            foreach($request->details as $key => $value){
                // dd($value);
              $product->whereHas('details', function($query) use ($key, $value){ 
                $query->where('key', $key)->whereIn('value',$value);               
               
              });
            }
        }
        // dd($request->details);
        $product = $product->with('details')->get()->toArray();
        return response()->json($product);
    }
}
