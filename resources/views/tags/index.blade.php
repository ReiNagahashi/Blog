@extends('layouts.app')
@section('content')

<div class="card">
    <div class="card-header">All Tags</div>
    <div class="card-body">
        @if(count($tags) > 0)
        <table class="table table-striped">
            <thead>
                <th>Image</th>
                <th>Title</th>
                <th colspan="2"></th>
            </thead> 
            <tbody>
                @foreach($tags as $tag)
              <tr>
              <td>{{$tag->name}}</td>
              <td>
                <a href="{{route('tag.edit',['id' => $tag->id])}}" class="btn btn-primary"><i class="fa fa-eye-slash" aria-hidden="true"></i>
                </a>
              </td>
              <td>
                <form action="{{route('tag.destroy',['id' => $tag->id])}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button>
                </form>
              </td>
            </tr>
              @endforeach
            </tbody>
        </table>
        @else
        <p class="text-center">No tags found.</p>
        @endif
    </div>
</div>
@endsection