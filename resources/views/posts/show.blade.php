@extends('layouts.app')
@section('content')
<a href="../posts" class="btn btn-primary">Go back</a>
<div class=text-center>
<h1>{{$post->title}}</h1>
<div>
    {{$post->body}}
</div>
<small>Written on{{$post->created_at}}</small>
<br>
<a href="{{route('edit',$post->id)}}"><button class="btn btn-success">Edit</button></a>

</div>

    
@endsection