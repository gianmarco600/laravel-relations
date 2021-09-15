@extends('layouts.app')

@section('content')
{{-- visualizzatore di errori di validazione tutti insieme --}}
{{-- @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>    
@endif --}}


<form action="{{route("admin.posts.store")}}" method="POST">

    @csrf

    <div class="my-4">
        <label for="title" class="form-label">titolo:</label>
        <input type="text" name="title" id="title" class="form-control
        @error('title')
            is-invalid
        @enderror"
        value="{{old('title')}}">

        @error('title')
            <div class="alert alert-danger mt-3">{{ $message }}</div>
        @enderror
    </div>

    <div class="my4">
        <label for="description">descrizione:</label>
        <textarea name="desription" id="description" class="form-control
        @error('description')
            is-invalid
        @enderror"
        rows="10">{{old('description')}}</textarea>
        @error('description')
            <div class="alert alert-danger mt-3">{{ $message }}</div>
        @enderror
    </div>

    <div class="mt-3">

        <a href="{{route("admin.posts.index")}}" class="btn btn-light">indietro</a>
        <button type="submit" class="btn btn-success">aggiungi post</button>
    </div>
        

</form>

@endsection