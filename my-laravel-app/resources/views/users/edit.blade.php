@extends("template.users")
@section("title", "Editar: {$user->name}")
@section("body")
<div class="container">
    <h1>Editar {{$user->name}}</h1>

    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @method("PUT")
        @csrf
        <div class="form-group">
            <label for="name">Nome</label>
            <input value="{{ $user->name }}" type="text" class="form-control" id="name" name="name" placeholder="Nome">
        </div>
        <div class="form-group">
            <label for="email">E-Mail</label>
            <input value="{{ $user->email }}" type="email" class="form-control" id="email" name="email" placeholder="E-Mail">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Senha">
        </div>
        <button type="submit" class="btn btn-primary">Atualizar</button>
    </form>
</div>
@endsection