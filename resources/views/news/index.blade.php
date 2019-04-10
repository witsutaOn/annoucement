@extends('layouts.app')

@section('content')
    <div class='container'>
        <h1>All News</h1>
        <div>
            <a href="{{ action('PostsController@create') }}">Create Post</a>
        </div>
        @foreach($post as $p)
            <div>
                <a href="{{ action('PostsController@show', ['id' => $p->id]) }}">
                    Title: {{ $p->title }}
                </a>
            </div>
            <hr>
        @endforeach
    </div>

@endsection