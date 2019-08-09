@extends('layouts.app')
@section('content')

<div class="card">
    <div class="card-header">All trashed Posts</div>
    <div class="card-body">
        @if(count($posts) > 0)
        <table class="table table-striped">
            <thead>
                <th>Image</th>
                <th>Title</th>
                <th colspan="2"></th>
            </thead> 
            <tbody>
                @foreach($posts as $post)
            <tr>
              <td><img src="{{asset('uploads/posts/'.$post->featured_image)}}"alt="{{$post->title}}" height="90px" width="90px"
                style ="border-radius:50%"></td>
                <td>{{$post->title}}</td>
              <td>
                  {{-- ここのpostsはweb.phpのresourceからきているのだ --}}
              <a href="{{route('post.restore',['id' => $post->id])}}" class="btn btn-info">Restore</a>
              </td>
              <td>
                <a href="{{route('post.kill',['id' => $post->id])}}" class="btn btn-danger">Delete</a>
              </td>
            </tr>
              @endforeach
            </tbody>
        </table>
        @else
        <p class="text-center">No trashed posts found.</p>
        @endif
    </div>
</div>
@endsection