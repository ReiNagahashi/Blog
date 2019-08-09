@extends('layouts.app')
@section('content')

<div class="card"> 
        <div class="card-header">{{isset($tag)? 'Edit tag':'New tag'}}</div>
        <div class="card-body">
        @if(count($errors) > 0)
            <ul class="list-group">
                @foreach($errors->all() as $errors)
            <li class="list-group-item text-danger">{{$errors}}</li>
                @endforeach
            </ul>
        @endif
    <form action="{{isset($tag)? route('tag.update',['id'=>$tag->id]) : route('tag.store')}}" method="POST">
        @csrf
        @if(isset($tag))
         @method('PUT')
         @endif
            <div class="form-group text-center">
                <label for="name">Tag Name</label>
                <input type="text" name="name" class="form-control"value= "{{isset($tag) ? $tag->name:""}}">
                    <button type="submit"class="btn btn-success btn-block">
                         {{isset($tag)? 'Edit tag':'Create tag'}}
                    </button>
            </div>
        </form>
    </div>
</div>
@endsection