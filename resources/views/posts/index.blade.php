@extends('layouts.app')
@section('content')

<div class="card">
    <div class="card-header">All Post</div>
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
              <a href="{{route('posts.show',['id' => $post->id])}}" class="btn btn-primary"><i class="fa fa-eye-slash" aria-hidden="true"></i>
              </a>
              </td>
            </tr>
              @endforeach
            </tbody>
        </table>
        @else
        <p class="text-center">No posts found.</p>
        @endif
    </div>
</div>
@endsection