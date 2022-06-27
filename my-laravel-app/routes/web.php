<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

/*
Route::get("/hello-world", function () {
    echo "Hello World!";
});

Route::get("/users/{nome}", function ($nome) {
    echo $nome;
});
*/

Route::get("/users", [UserController::class, "index"])->name("users.index");
Route::get("/users/{id}", [UserController::class, "show"])->name("users.show");
