<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\Admin\LoginController;
use App\Http\Controllers\Api\V1\Admin\TagController;
use App\Http\Controllers\Api\V1\Admin\CategoryController;
use App\Http\Controllers\Api\V1\Admin\PostController;
use App\Http\Controllers\Api\V1\Admin\MenuController;
use App\Http\Controllers\Api\V1\Admin\SliderController;
use App\Http\Controllers\Api\V1\Admin\UserController;
use App\Http\Controllers\Api\V1\Admin\DashboardController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1/admin')->group(function () {

    //route login
    Route::post('/login', [LoginController::class, 'index']);

    //group route with middleware "auth"
    Route::group(['middleware' => 'auth:api'], function() {

        //data user
        Route::get('/user', [LoginController::class, 'getUser']);

        //refresh token JWT
        Route::get('/refresh', [LoginController::class, 'refreshToken']);

        //logout
        Route::post('/logout', [LoginController::class, 'logout']);
        //Tags
        Route::apiResource('/tags', TagController::class);
        //Category
        Route::apiResource('/categories', CategoryController::class);

        //Post
        Route::apiResource('/posts', PostController::class);
        //Menus
        Route::apiResource('/menus', MenuController::class);
        //Sliders
        Route::apiResource('/sliders', SliderController::class);
        //Users
        Route::apiResource('/users',UserController::class);

        //dashboard
        Route::get('/dashboard', [DashboardController::class, 'index']);
    });

});

//group route with prefix "web"
Route::prefix('v1/web')->group(function () {

    //index tags
    Route::get('/tags', [App\Http\Controllers\Api\V1\Web\TagController::class, 'index']);

    //show tag
    Route::get('/tags/{slug}', [App\Http\Controllers\Api\V1\Web\TagController::class, 'show']);

    Route::get('/categories', [App\Http\Controllers\Api\V1\Web\CategoryController::class, 'index']);

    //show category
    Route::get('/categories/{slug}', [App\Http\Controllers\Api\V1\Web\CategoryController::class, 'show']);

    //categories sidebar
    Route::get('/categorySidebar', [App\Http\Controllers\Api\V1\Web\CategoryController::class, 'categorySidebar']);

    //index posts
    Route::get('/posts', [App\Http\Controllers\Api\V1\Web\PostController::class, 'index']);

    //show posts
    Route::get('/posts/{slug}', [App\Http\Controllers\Api\V1\Web\PostController::class, 'show']);

    //posts homepage
    Route::get('/postHomepage', [App\Http\Controllers\Api\V1\Web\PostController::class, 'postHomepage']);

    //store comment
    Route::post('/posts/storeComment', [App\Http\Controllers\Api\V1\Web\PostController::class, 'storeComment']);

    //store image
    Route::post('/posts/storeImage', [App\Http\Controllers\Api\V1\Web\PostController::class, 'storeImagePost']);

    //index menus
    Route::get('/menus', [App\Http\Controllers\Api\V1\Web\MenuController::class, 'index']);

    //index sliders
    Route::get('/sliders', [App\Http\Controllers\Api\V1\Web\SliderController::class, 'index']);

});
