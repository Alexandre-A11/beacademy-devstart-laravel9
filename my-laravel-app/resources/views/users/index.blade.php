@extends("template.users")
@section("title", "Listagem de Usuários")
@section("body")

<div class="container">
    <h1>Listagem de Usuários</h1>
    <a href="{{ route('users.create') }}" class="btn btn-primary mb-3 float-right">Novo Usuário</a>
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
            @foreach ($users as $user)
            <tr>
                <th scope="row">{{$user->id}}</th>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{date("d/m/Y | H:i", strtotime($user->created_at))}}</td>
                <td><a href="{{route('users.show', $user->id)}}" class="btn btn-info text-white">Visualizar</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection