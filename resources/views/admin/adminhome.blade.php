@extends('layouts.app')
@section('content')

  <div class="container">
    <a href="/category/create" class="btn btn-info mb-4">Category</a>
    <all-post  :postdata= "{{$posts}}"></all-post>
  </div>

@endsection
