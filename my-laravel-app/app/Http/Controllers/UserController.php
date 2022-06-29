<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller {
    public function __construct(User $user) {
        $this->model = $user;
    }
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

    public function create() {
        return view("users.create");
    }

    public function store(Request $request) {
        // # Método 1:
        // $user = new User;
        // $user->name = $request->name;
        // $user->email = $request->email;
        // $user->password = bcrypt($request->password);
        // $user->save();
        // # Método 2:
        $data = $request->all();
        $data["password"] = bcrypt($request->password);

        $this->model->create($data);


        return redirect()->route("users.index");
    }
}
