@extends('layouts.app')

@section('content')

    <div class="container">
        <h3>Dettaglio post:</h3>
        <div class="card">
            <div class="card head">
                <h4>{{$post->title}}</h4>
            </div>
            <div class="card-body">
                <h5 class="card-title">{{$post->slug}}</h5>
                <h6 class="card-text">{{$post->description}}</h6>
            </div>

        </div>
        <a href="{{route('admin.posts.index')}}" class="btn btn-light mt-3">indietro</a>
    </div>
    
@endsection