<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    UserController,
    ViaCepController,
    PostController
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
Route::middleware(['auth'])->group(function () {
    Route::get("/posts", [PostController::class, "index"])->name("posts.index");
    Route::get("/users/{id}/posts", [PostController::class, "show"])->name("posts.show");

    Route::post('/user', [UserController::class, 'store'])->name('users.store');
    Route::get("/users", [UserController::class, "index"])->name("users.index");
    Route::delete("/users/{id}", [UserController::class, 'destroy'])->name('users.delete');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::put("/users/{id}", [UserController::class, "update"])->name("users.update");
    Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');
    Route::get("/users/{id}/edit", [UserController::class, "edit"])->name("users.edit");

    // Via CEP Web Service
    Route::get("/viacep", [ViaCepController::class, "index"])->name("viacep.index");
    Route::post("/viacep", [ViaCepController::class, "index"])->name("viacep.index.post");
    Route::get("/viacep/{cep}", [ViaCepController::class, "show"])->name("viacep.show");
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', [UserController::class, 'admin'])->name('admin.index');
});

require __DIR__ . "/auth.php";
