@extends('layouts.app')
@section('content')

  <div class="container">
    <a href="/adminhome" class="btn btn-info mb-4">Posts</a>
    <category-list :allcategory="{{$category}}" ></category-list>
  </div>

@endsection
