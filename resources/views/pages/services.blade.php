@extends('layouts.app')
@section('content')
<div class="">

    <h1>{{$title}}</h1>
    @if (count($services) >0)
    <ul>
    @foreach ($services as $item)
    <li>
        {{$item}}
    </li>
    @endforeach
</ul>
    @endif
</div>
@endsection