@extends("template.users")
@section("title", "Listagem de Usuários")
@section("body")

<div class="container">
    <h1>Listagem de Usuários</h1>

    @if (session()->has("success"))
    <div class="alert alert-success">
        {{ session()->get("success") }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    @if (session()->has("update"))
    <div class="alert alert-success">
        {{ session()->get("update") }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    @if (session()->has("delete"))
    <div class="alert alert-danger">
        {{ session()->get("delete") }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <div class="container">
        <div class="row">
            <div class="col-sm mt-2-mb-5">
                <a href="{{ route('users.create') }}" class="btn btn-success mb-3 float-right">Novo Usuário</a>
            </div>
            <div class="col-sm mt-2-mb-5">
                <form action="{{ route('users.index')}}" method="GET">
                    <div class="input-group">
                        <input type="text" name="search" id="search" class="form-control control"
                            placeholder="Pesquisar...">
                        <button type="submit" class="btn btn-outline-primary">Pesquisar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <table class="table">
        <thead class="thead-dark text-center">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Foto</th>
                <th scope="col">Nome</th>
                <th scope="col">E-mail</th>
                <th scope="col">Postagens</th>
                <th scope="col">Cadastrado em</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody class="text-center">
            @foreach ($users as $user)
            <tr>
                <th scope="row">{{$user->id}}</th>
                @if ($user->image)
                <th><img src="{{ asset('storage/'.$user->image) }}" width="50px" height="50px" class="rounded-circle">
                </th>
                @else
                <th><img src="{{ asset('storage/profile/avatar.jpg') }}" width="50px" height="50px"
                        class="rounded-circle"></th>
                @endif
                <td>{{$user->name}}</td>
                <td><a href="{{route('posts.show', $user->id)}}" class="btn btn-outline-dark">Postagens -
                        {{$user->posts->count()}}</a></td>
                <td>{{$user->email}}</td>
                <td>{{ formatDateTime($user->created_at) }}</td>
                <td><a href="{{route('users.show', $user->id)}}" class="btn btn-primary text-white">Visualizar</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="justify-content-center pagination">
        {{ $users->links('pagination::bootstrap-4') }}
    </div>
</div>
@endsection