<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::middleware(['auth'])->group(function () {
    Route::resource('home', 'HomeController');
    Route::resource('account', 'AccountController');
    Route::post("/account/diposit","AccountController@diposit");
    Route::post("/account/withdrow","AccountController@withdrow");
    Route::post("/account/transfer","AccountController@transfer");
    Route::post("/pay-auth", "PayController@auth");
    Route::post("/game score/{value}", 'GameController@score');
    Route::get("/game score/highscore", 'GameController@highScore');

    Route::resource('payment', 'PaymentController');
    Route::resource('/play game', 'GameController');
    Route::resource('info', 'InfoController');

    Route::get('api/gamelistener/{score}/{cusomer_id}', "ApiController@gameScore"); 
});

Route::resource("pay", "PayController");