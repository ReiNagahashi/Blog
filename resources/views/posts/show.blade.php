@extends('layouts.app')
@section('content')

<div class="card"> 
<div class="card-header">Post Details - {{$post->title}}</div>
<img src="{{ asset('uploads/posts/'.$post->featured_image)}}" alt="{{$post->title}}" height="250px" width="100%">
<div class="card-body">
<div class="card-text">{!! $post->content !!}</div>
<p>Category:{{$post->category->name}}</p>
<p>Created By: {{$post->user->name}}</p>
    <form action="{{route('posts.destroy',['id' => $post->id])}}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger btn-xs float-right"><i class="fa fa-trash" aria-hidden="true"></i></button>
     </form>
     <a href="{{route('posts.edit',['id' => $post->id])}}" class="btn btn-primary"><i class="fas fa-edit"></i></a>            
    </div>
</div>
@endsection