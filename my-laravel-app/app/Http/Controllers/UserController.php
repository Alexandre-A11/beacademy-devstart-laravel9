<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller {
    public function index() {
        // $users = [
        //     "name" => ["John Doe", "Jane Doe"]
        // ];

        $users = User::all();
        // dd($users);
        return view("users.index", compact("users"));
    }

    //     public function show($id) {
    //         dd("O usuário com o ID {$id} foi exibido.");
    //     }

    public function show($id) {
        // $user = User::find($id);
        // $user = User::where("id", $id)->first();
        // $user = User::findOrFail($id);

        if (!$user = User::find($id)) {
            abort(404);
            // return redirect()->route("users.index");
        }
        // return $user;
        return view("users.show", compact("user"));
    }
}
