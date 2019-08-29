@extends('layouts.app')
@section('content')

  <div class="container">
    <a href="/adminhome" class="btn btn-info mb-4">Posts</a>
    <edit-post  :post="{{$post}}"></edit-post>
  </div>

@endsection
