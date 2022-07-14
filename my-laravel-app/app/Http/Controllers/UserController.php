<?php

namespace App\Http\Controllers;

use App\Exceptions\UserControllerException;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUpdateUserFormRequest;
use App\Models\Team;

class UserController extends Controller {
    public function __construct(User $user) {
        $this->model = $user;
    }
    public function index(Request $request) {
        // $users = [
        //     "name" => ["John Doe", "Jane Doe"]
        // ];

        $users = $this->model->getUsers(
            $request->search ?? ''
        );

        // $users = User::paginate(5);
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
            // abort(404);
            // return redirect()->route("users.index");
        }

        // $team = Team::find($id);
        // $team->load("users");
        // return $team;

        // return $user;
        if ($user){
            return view("users.show", compact("user"));
        }else {
            throw new UserControllerException('User não encontrado.');
        }
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

        if ($request->image) {
            // $file = $request["image"];
            // $path = $file->store("profile", "public");
            // $data["image"] = $path;
            $data["image"] = $request->file("image")->store("profile", "public");
        }


        $this->model->create($data);


        // $request->session()->flash("success", "Usuário criado com sucesso!");
        // return redirect()->route("users.index");
        return redirect()->route("users.index")->with("success", "Usuário criado com sucesso!");
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

        $data['is_admin'] = $request->is_admin ? 1:0;

        $user->update($data);

        // return redirect()->route("users.index");
        return redirect()->route("users.index")->with("update", "Usuário atualizado com sucesso!");
    }

    public function destroy($id) {
        if (!$user = $this->model->find($id)) {
            abort(404);
        }
        $user->delete();

        
        return redirect()->route("users.index")->with("delete", "Usuário excluído com sucesso!");
    }

    public function admin() {
        return view("admin.index");
    }
}