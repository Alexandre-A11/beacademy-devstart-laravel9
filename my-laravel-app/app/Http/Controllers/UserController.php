<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller {
    public function index() {
        // $users = [
        //     "name" => ["John Doe", "Jane Doe"]
        // ];

        $users = User::all();
        // dd($users);
        return $users;
    }

    //     public function show($id) {
    //         dd("O usuário com o ID {$id} foi exibido.");
    //     }
}
