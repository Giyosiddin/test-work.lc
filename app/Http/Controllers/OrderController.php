<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\User;

class OrderController extends Controller
{	
	public function getOrders($user_id)
	{
		$user = User::with('orders')->find($user_id);
		$orders = $user->orders->where('order_status', '!=', '0')->toArray();
		return response()->json($orders, 200);
	}

    public function addToCart()
    {
    	$product_id = request('product_id');
    	$product = Product::find($product_id);
    	if(!$product){
    		abort(404);
    	}
    	// dd(request('user_id'));
    	$user_id = request('user_id');	    	
    	$user_order = Order::where('user_id', $user_id)->where('order_status', '0')->first();
    	if(isset($user_order)){
    		if($user_order->products->contains('id', $product_id)){
    			$count = $user_order->products()->where('product_id', $product_id)->first()->pivot->count;
    			$user_order->products()->updateExistingPivot($product_id, ['count' => $count+1]);
	    		return response()
	    			->json(['message' => 'Product added to cart successfully!', 'count' => $count+1]);
		    }else{
		    	$add_new_product = $user_order->products()->attach($product_id, [ 'product_name' => $product->title, 'product_price' => $product->price]);
		    	// dd('not id');
    			return response()->json('Product added to cart successfully!', 200);
		    }
    	}else{
    		$order = Order::create([
    			'user_id' => $user_id
    		]);

			$order->products()->attach($product_id, [ 'product_name' => $product->title, 'product_price' => $product->price]);

    		return response()->json('Product added to cart successfully!', 200);
    	}
    	return response()->json('Product added to cart successfully!', 200);

    }

    public function removeCart()
    {
    	$product_id = request('product_id');
    	$user_id = request('user_id');
    	$product = Product::find($product_id);
    	if(!$product){
    		abort(404);
    	}
    	$user_order = Order::where('user_id', $user_id)->where('order_status', '0')->first();
    	if(isset($user_order)){
    		if($user_order->products->contains('id', $product_id)){
    			$count = $user_order->products()->where('product_id', $product_id)->first()->pivot->count;
    			$user_order->products()->updateExistingPivot($product_id, ['count' => $count+1]);
	    		return response()
	    			->json(['message' => 'Product added to cart successfully!', 'count' => $count+1]);
		    }else{
		    	$add_new_product = $user_order->products()->attach($product_id, [ 'product_name' => $product->title, 'product_price' => $product->price]);
		    	// dd('not id');
    			return response()->json('Product added to cart successfully!', 200);
		    }
    	}else{
    		$order = Order::create([
    			'user_id' => $user_id
    		]);

			$order->products()->attach($product_id, [ 'product_name' => $product->title, 'product_price' => $product->price]);

    		return response()->json('Product added to cart successfully!', 200);
    	}
    	return response()->json('Product added to cart successfully!', 200);
    }

    public function deleteOrder()
    {
    	$id = request('id');
    	$order = Order::find($id);
    	$order->products()->detach();
    	$order->delete();

	    return response()->json('Deleted order', 200);

    }

    public function orderConfirm(Request $request)
    {
    	// dd('s');
    	$rules = [
            'order_id' => 'required',
            'fio' => 'required|string|max:255',
            'email' => 'required|string|email',
            'phone' => 'required|string',
            'address' => 'required|string',
        ];
    	$customMessages = [
	        'order_id.required' => 'The :attribute field can not be blank.',
	        'fio.required' => 'The :attribute field can not be blank.',
	        'email.required' => 'The :attribute field can not be blank.',
	        'phone.required' => 'The :attribute field can not be blank.',
	        'address.required' => 'The :attribute field can not be blank.',
	    ];
    	$attr = $request->validate($rules, $customMessages);

    	$order = Order::find($request->order_id);
    	if(!$order){
    		return response()->json(['message' => 'Not found order!'], 404);
    	}
    	if(empty($order->user_id) && isset($request->user_id)){
    		$order->user_id = $request->user_id;
    	}
    	$order->fio = $request->fio;
    	$order->email = $request->email;
    	$order->phone = $request->phone;
    	$order->address = $request->address;
    	$order->order_status = '1';
    	$save = $order->save();
    	if($save){
    		return response()->json(['message' => 'Order confirmed successfully!'], 200);
    	}
    }

  	
}
