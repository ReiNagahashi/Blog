@extends('layouts.app')
@section('content')

<div class="card">
    <div class="card-header">All Categories</div>
    <div class="card-body">
        @if(count($categories) > 0)
        <table class="table table-striped">
            <thead>
                <th>Image</th>
                <th>Title</th>
                <th colspan="2"></th>
            </thead> 
            <tbody>
                @foreach($categories as $category)
              <tr>
              <td>{{$category->name}}</td>
              <td>
              <a href="{{route('category.edit',['id' => $category->id])}}"
                 class="btn btn-primary"><i class="fa fa-eye-slash" aria-hidden="true"></i>
              </a>
              </td>
              <td>
                <form action="{{route('category.destroy',['id' => $category->id])}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">
                       <i class="fa fa-trash" aria-hidden="true"></i>
                    </button>
                </form>
              </td>
            </tr>
              @endforeach
            </tbody>
        </table>
        @else
        <p class="text-center">No Category found.</p>
        @endif
    </div>
</div>
@endsection