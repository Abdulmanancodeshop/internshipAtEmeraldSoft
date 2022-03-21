@extends('layouts.app')

@section('content')
<h1 class='text-center'>Create Posts</h1>
{{-- {!! Form::open(['action' => 'PostsController@store','method'=>'POST']) !!}
    <div class='form-group'>
        {{Form::label('title','Title')}}
        {{Form::text('title','',['class'=>'form-control','placeholder'=>'Title'])}}
    </div>
{!! Form::close() !!} --}}

<form class="text-center" action="javascript:void(0);">


<label for="title" id="title1" name="title1" >Title</label>
<input type="text" name="title" id="title" />
<br>
<label for="body" id="body" name="body">Title</label>
{{-- <input type="text-area" name="text1" id="text1" /> --}}
<textarea name="body" id="body1" cols="30" rows="10"></textarea>
<button onclick="createp();">Submit</button>
</form>


@endsection


<script>

function createp() 
    {
        debugger;

        axios.post("{{route('store')}}",{
            title: 
            document.getElementById('title').value,
            body: document.getElementById('body1').value
        }).then(response => {
            debugger;
        })
        .catch(error => {
//    alert("error");
console.log(error);
debugger;
        })
        
    }
</script>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.24.0/axios.min.js" integrity="sha512-u9akINsQsAkG9xjc1cnGF4zw5TFDwkxuc9vUp5dltDWYCSmyd0meygbvgXrlc/z7/o4a19Fb5V0OUE58J7dcyw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>