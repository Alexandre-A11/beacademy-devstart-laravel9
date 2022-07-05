@extends("template.users")
@section("title", "Posts de {{$user->name}}")
@section("body")

<h1>Postagens do {{$user->name}}</h1>

@foreach ($posts as $post)

<div class="mb-3">
    <label for="" class="form-label">Identificação N°:<br><strong>{{$post->id}}</strong></label>
    <br>
    <label class="form-label">Status:<br><strong>{{ $post->active?'Ativo':'Inativo'}}</strong></label>
    <br>
    <label class="form-label">Título:<br><strong>{{$post->title}}</strong></label>
    <br>
    <label class="form-label">Postagem:<br></label>
    <textarea class="form-control" rows="3">{{$post->post}}</textarea>
</div>

@endforeach
@endsection