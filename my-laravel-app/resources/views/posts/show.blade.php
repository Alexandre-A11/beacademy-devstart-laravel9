@extends("template.users")
@section("title", "Posts de {{$user->name}}")
@section("body")

<div class="container">
    <h1>Postagens do {{$user->name}}</h1>
</div>

@foreach ($posts as $post)

<div class="mb-5 container">
    <label class="form-label">Status: <strong>{{ $post->active?'Ativo':'Inativo'}}</strong></label>
    &nbsp;
    <label for="" class="form-label">Identificação N°: <strong>{{$post->id}}</strong></label>
    <br>
    <label class="form-label">Título: <strong>{{$post->title}}</strong></label>
    <br>
    <label class="form-label">Postagem:</label><br>
    <p class="form-control" rows="3">{{$post->post}}</p>
</div>
@endforeach
@endsection