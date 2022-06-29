<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    UserController,
    ViaCepController
};


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

// Via CEP Web Service
Route::get("/viacep", [ViaCepController::class, "index"])->name("viacep.index");
Route::post("/viacep", [ViaCepController::class, "index"])->name("viacep.index.post");
Route::get("/viacep/{cep}", [ViaCepController::class, "show"])->name("viacep.show");
