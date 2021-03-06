@extends("template.users")
@section("title", "Cadastrar Usuário")
@section("body")
<div class="container">
    <h1>Novo Usuário</h1>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Nome</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Nome">
        </div>
        <div class="form-group">
            <label for="email">E-Mail</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="E-Mail">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Senha">
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Selecione uma imagem</label>
            <input type="file" class="form-control form-control-sm" id="image" name="image" />
        </div>



        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
</div>
@endsection