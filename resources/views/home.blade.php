@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a href="{{route('store')}}" style=""><h3>Create Post</h3></a>
                    <h3>{{ __('Your Blog Posts') }}</h3>
                    <table>
                        <tr>
                            <th>Title</th>
                            <th></th>
                            <th></th>
                        </tr>
                        @foreach ($posts as $post)
                        <tr>
                            <td>{{$post->title}}</td>
                            <td><a href="{{route('edit',$post->id)}}" class='btn btn-success'>Edit</a></td>
                            <td><button class='btn btn-danger' id={{$post->id}} onclick="dlt(this.id)">Delete Post</button>
        </div></td>
        
                            {{-- <th><a href="{{route('destroy',)}}" class="btn btn-danger">Delete</a></th> --}}
                        </tr>
                            
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
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
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.24.0/axios.min.js" integrity="sha512-u9akINsQsAkG9xjc1cnGF4zw5TFDwkxuc9vUp5dltDWYCSmyd0meygbvgXrlc/z7/o4a19Fb5V0OUE58J7dcyw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


