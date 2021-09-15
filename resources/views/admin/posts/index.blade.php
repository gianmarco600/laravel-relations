@extends('layouts.app')

@section('content')

  <a href="{{route('admin.posts.create')}}" class="btn btn-success mb-5">Crea post</a>

  @if (session('cancella'))
      <p class="alert alert-danger">
        {{session('cancella')}}   
      </p>            
  @endif

  @if (session('modifica'))
      <p class="alert alert-warning">
        {{session('modifica')}}   
      </p>            
  @endif

  @if (session('creato'))
      <p class="alert alert-info">
        {{session('creato')}}   
      </p>            
  @endif

  <table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Titolo</th>
        <th scope="col">Azioni</th>
      </tr>
    </thead>
    <tbody>

      {{-- ciclo tutti gli elementi presenti ne DB --}}
      @foreach ($posts as $post)
        <tr>
          <th scope="row">{{$post->id}}</th>
          <td>{{$post->title}}</td>
          <td>
            <a href="{{route('admin.posts.show', $post->slug)}}" class="btn btn-primary px-3">show</a>
            <a href="{{route('admin.posts.edit', $post->slug)}}" class="btn btn-warning">edit</a>
            <form action="{{route('admin.posts.destroy', $post->id)}}" method="POST" class="d-inline-block">
              {{-- Per ogni form bisogna inserire il token altrimenti il cambiamento non viene accettato dal sistema --}}
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger del" >delete</button>
            </form>
          </td>
        </tr>
      @endforeach
      
    </tbody>
  </table>
  
@endsection