@extends("template.users")
@section("title", "Editar: {$user->name}")
@section("body")
<div class="container">
    <h1>Editar {{$user->name}}</h1>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
        @method("PUT")
        @csrf
        <div class="form-group">
            <label for="name">Nome</label>
            <input value="{{ $user->name }}" type="text" class="form-control" id="name" name="name" placeholder="Nome">
        </div>
        <div class="form-group">
            <label for="email">E-Mail</label>
            <input value="{{ $user->email }}" type="email" class="form-control" id="email" name="email"
                placeholder="E-Mail">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Senha">
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Selecione uma imagem</label>
            <input type="file" class="form-control form-control-sm" id="image" name="image" />
        </div>

        <div class="form-check mb-3">
            <input type="checkbox" class="form-check-input" id="admin" name="admin" {{ $user->admin ? "checked" : "" }}>
            <label class="form-check-label" for="admin">Administrador</label>
        </div>

        <button type="submit" class="btn btn-primary">Atualizar</button>
    </form>
</div>
@endsection