@extends("template.users")
@section("title", "Listagem de Usuários")
@section("body")

<div class="container">
    <h1>Listagem de Posts</h1>

    <table class="table">
        <thead class="thead-dark text-center">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Usuário</th>
                <th scope="col">Titulo</th>
                <th scope="col">Postagem</th>
                <th scope="col">Cadastrado em</th>
            </tr>
        </thead>
        <tbody class="text-center">
            @foreach ($posts as $post)
            <tr>
                <th scope="row">{{$post->id}}</th>
                <th scope="row">{{$post->user->name}}</th>
                <td>{{$post->title}}</td>
                <td>{{$post->post}}</td>
                <td>{{date("d/m/Y | H:i", strtotime($post->created_at))}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="justify-content-center pagination">
        {{ $posts->links('pagination::bootstrap-4') }}
    </div>
</div>
@endsection