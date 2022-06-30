<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUpdateUserFormRequest;

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

    public function store(StoreUpdateUserFormRequest $request) {
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

    public function edit($id) {
        if (!$user = $this->model->find($id)) {
            abort(404);
        }
        return view("users.edit", compact("user"));
    }

    public function update(StoreUpdateUserFormRequest $request, $id) {
        if (!$user = $this->model->find($id)) {
            abort(404);
        }

        $data = $request->only("name", "email");

        if ($request->password) {
            $data["password"] = bcrypt($request->password);
        }

        $user->update($data);

        return redirect()->route("users.index");
    }

    public function destroy($id) {
        if (!$user = $this->model->find($id)) {
            abort(404);
        }
        $user->delete();
        return redirect()->route("users.index");
    }
}
