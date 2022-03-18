@extends('layouts.app')

@section('content')
<h1 class='text-center'>Posts</h1>

@if (count( $posts ) > 1)
    @foreach ($posts as $post)
        <div >
            <h3><a href="./posts/{{$post->id}}">{{$post->title}}</a></h3>
            <small>Written on{{$post->created_at}}</small>
        </div>
    @endforeach
@else
    <p>No posts yet</p>    
@endif

@endsection