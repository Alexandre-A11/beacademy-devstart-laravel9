@extends("template.users")
@section("title", "Usuário: {$user->name}")
@section("body")
<div class="container">
    <h1>Usuário {{$user->name}}</h1>
    <table class="table">
        <thead class="thead-dark text-center">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">E-mail</th>
                <th scope="col">Cadastrado em</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody class="text-center">
            <tr>
                <th scope="row">{{$user->id}}</th>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{date("d/m/Y | H:i", strtotime($user->created_at))}}</td>
                <td>
                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning white">Editar</a>

                    <form action="{{ route('users.delete', $user->id) }}" method="POST" class="d-inline">
                        @method("DELETE")
                        @csrf
                        <button type="submit" class="btn btn-danger text-white">Deletar</button>
                    </form>
                </td>
            </tr>
        </tbody>
    </table>
</div>
@endsection