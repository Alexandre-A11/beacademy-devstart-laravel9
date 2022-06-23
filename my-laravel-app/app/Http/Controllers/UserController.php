<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller {
    public function index() {
        $users = [
            "name" => ["John Doe", "Jane Doe"]
        ];

        dd($users);
    }

    public function show($id) {
        dd("O usuário com o ID {$id} foi exibido.");
    }
}
