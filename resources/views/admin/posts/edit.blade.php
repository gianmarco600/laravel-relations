@extends('layouts.app')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>    
    @endif
    <form action="{{route('admin.posts.update', $post->id)}}" method="POST">
    @csrf

    @method('PUT')

    <div class="my-4">
        <label for="title" class="form-label">titolo:</label>
        <input type="text" class="form-control
        @error('title')
            is-invalid
        @enderror"
        name="title" id="title" value="{{old('title', $post->title)}}">
        @error('title')
            <div class="alert alert-danger mt-3">{{ $message }}</div>
        @enderror
    </div>
    <div class="my-4">
        <label for="description" class="form-label">descrizione:</label>
        <textarea name="description" class="form-control
        @error('description')
            is-invalid
        @enderror"
        id="description"  rows="6">{{old('description', $post->description)}}</textarea>
        @error('description')
            <div class="alert alert-danger mt-3">{{ $message }}</div>
        @enderror
    </div>
    <a href="{{route('admin.posts.index')}}" class="btn btn-light">Torna indietro</a>
      <button type="submit" class="btn btn-primary">salva modifiche</button>
    </form>
    
@endsection