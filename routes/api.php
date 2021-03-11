<?php
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::post('/auth/register', [AuthController::class, 'register']);

Route::post('/auth/login', [AuthController::class, 'login']);

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/me', function(Request $request) {
        return auth()->user();
    });

    Route::post('/auth/logout', [AuthController::class, 'logout']);
});

Route::post('/add-to-cart', [OrderController::class, 'addToCart']);

Route::get('/categories', [CategoryController::class, 'categories']);

Route::get('/orders/{user_id}', [OrderController::class, 'getOrders']);

Route::get('/category/{slug}', [CategoryController::class, 'category']);

Route::get('/{category_slug}/{slug}', [ProductController::class, 'show']);

Route::post('/order-confirm', [OrderController::class, 'orderConfirm']);

Route::post('/delete-order', [OrderController::class, 'deleteOrder']);