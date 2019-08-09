@extends('layouts.app')
@section('content')

<div class="card"> 
        <div class="card-header">{{isset($category)? 'Edit Category':'New Category'}}</div>
        <div class="card-body">
        @if(count($errors) > 0)
            <ul class="list-group">
                @foreach($errors->all() as $errors)
            <li class="list-group-item text-danger">{{$errors}}</li>
                @endforeach
            </ul>
        @endif
    <form action="{{isset($category)? route('category.update',['id'=>$category->id]) : route('category.store')}}" method="POST">
        @csrf
        @if(isset($category))
         @method('PUT')
         @endif
            <div class="form-group text-center">
                <label for="name">Category Name</label>
                <input type="text" name="name" class="form-control"value= "{{isset($category) ? $category->name:""}}">
                    <button type="submit"class="btn btn-success btn-block">
                         {{isset($category)? 'Edit Category':'Create Category'}}
                    </button>
            </div>
        </form>
    </div>
</div>
@endsection