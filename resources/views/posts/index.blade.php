@extends('layouts.app')

@section('content')
<h1 class='text-center'>Posts</h1>
<div id="posts_div">
@if (count( $posts ) > 0)
    @foreach ($posts as $post)
        <div class="text-center" >
            <h3><a href="./posts/{{$post->id}}">{{$post->title}}</a></h3>
            <small>Written on{{$post->created_at}}</small><br>
            <button class='btn btn-danger' id={{$post->id}} onclick="dlt(this.id)">Delete Post</button>
        </div>
    @endforeach
    {{-- {{ $posts->links() }} for pagination --}}
@else
    <p>No posts yet</p>    
@endif
    </div>
{{-- <a href="{{route('store')}}"><button >Create Post</button></a> --}}
@endsection


<script>
    function dlt(dl) 
    {
        debugger;
        var getId = dl;
        var routeId = "{{route('destroy',":getId")}}";

        routeId = routeId.replace(':getId',getId);
        

        axios.delete(routeId,{
            _method: 'Delete'
        }).then(response => {
            debugger;
            post_html = "";
            post_html += '<div class="text-center" >';
            for(a=0;a<response.data.length;a++){
                post_html += "<h3><a href='./posts/"+response.data[a].id+"'>"+response.data[a].title+"</a></h3>";  
                // post_html += '<div><h3>'+response.data[a].body+'</div></h3>'; 
                post_html += '<div><small>Written on'+response.data[a].created_at+'</small><br></div>';
                post_html += '<div><button class="btn btn-danger" id="'+response.data[a].id+'" onclick="dlt('+response.data[a].id+')">Delete Post</button></div>';
                // post_html += document.getElementById('posts_div').innerHTML; 

            
            }
       

            

           
            // post_html += '<h3><a href="./posts/'{{$post->id}}'">'{{$post->title}}'</a></h3>';
            // post_html +='<small>Written on'{{$post->created_at}}'</small><br>';
            // post_html += '<button class='btn btn-danger' id='{{$post->id}}' onclick="'dlt(this.id)'">Delete Post</button>';

            
    
            post_html += '</div>';
            document.getElementById('posts_div').innerHTML = post_html;
       //  window.location.href = "";
        })
        .catch(error => {
//    alert("error");
console.log(error);
        })
        
    }
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.24.0/axios.min.js" integrity="sha512-u9akINsQsAkG9xjc1cnGF4zw5TFDwkxuc9vUp5dltDWYCSmyd0meygbvgXrlc/z7/o4a19Fb5V0OUE58J7dcyw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>