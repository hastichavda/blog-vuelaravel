<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

@extends('layouts.app')
@section('content')
    <div class="container-fluid row">  
        <div class="col-12 col-sm-6 col-md-8">
                @foreach ($posts as $post)
                <li class="post">
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
                                {{$post->category->name}}
                            </h5>
                            <small>
                                created_at:<i>{{ Carbon\Carbon::parse($post->created_at)->format('d-m-Y')  }}</i>
                            </small>
                            <button class="btn btn-primary btn-xs pull-right">Read More</button>
                        </div>
                    </div>
                </li>  
                @endforeach
        </div>
        <div class="col-6 col-sm-2 col-md-4 mt-2 ">
                <div class=" category">
                    <div class="card-body">
                        @foreach ($categories as $category)
                            <li class="post">
                               <a href="">
                                    {{$category->name}}
                               </a>
                            </li>
                        @endforeach
                    </div>
                </div>
            </div>
    </div>
@endsection
<style>
    .post{
        list-style:none;
        margin: 10px 0 20px 0;
    }
    .category{
        background: #F3A9C9 ;
    }
</style>
