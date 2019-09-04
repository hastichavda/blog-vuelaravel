<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

@section('content')
<a  class="btn btn-primary mt-4 mb-5" href="/">Back to Home</a>

@foreach ($posts as $post)
<li class="post mb-3">
    <div class="card">
        <div class="card-header">
            <h4>
                <strong>{{$post->title}}</strong>
            </h4>
        </div>
        <div class="card-body">
            <p>{{$post->description}}</p>
        </div>
        <div class="card-footer">
            <h5>
             
            </h5>
            <small>
                created_at:<i>{{ Carbon\Carbon::parse($post->created_at)->format('d-m-Y')  }}</i>
            </small>
        </div>
    </div>
</li>  
@endforeach



<style>
    .post{
        list-style: none;
    }
</style>