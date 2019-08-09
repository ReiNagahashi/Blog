@extends('layouts.app')
@section('content')

<div class="card">
    <div class="card-header">{{isset($post)? 'Edit Posts':'Create Posts'}}</div>
    <div class="card-body">
        @if(count($errors) > 0)
            <ul class="list-group">
                {{-- 1つ目のerrorjはただのオブジェクトなので、その後にファンクションであるallでエラーを表示させるようにしなければならないz --}}
                @foreach($errors->all() as $errors)
            <li class="list-group-item text-danger">{{$errors}}</li>
                @endforeach
            </ul>
        @endif
    <form action="{{route('posts.update',['id'=>$post->id])}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
            <div class="form-group">
                <label for="title">Title</label>
            <input type="text" name="title" class="form-control" value="{{$post->title}}">
            </div>
            <div class="form-group">
                <label for="content">Content</label>
                <textarea name="content" id="" cols="30" rows="10" class="form-control" >{{$post->content}}</textarea>
            </div>
            <div class="form-group">
                 <label for="featured">Featured Image</label>
                <input type="file" name="featured" class="form-control">
            </div>
            <div class="form-group">
                    <label for="category">Select Category</label>
                    <select name="category_id" id="category" class="form-control">
                       @foreach($categories as $category)
                         <option value="{{$category->id}}"
                            @if($post->category_id == $category->id)
                            selected
                           @endif >{{$category->name}}</option>
                       @endforeach
                    </select>
               </div>
               <div class="form-group">
                    <label for="tags">Select tags</label>
                    @foreach($tags as $tag)
                        <div class="checkbox">
                        <label><input type="checkbox" name="tags[]" value="{{$tag->id}}"
                        @foreach($post->tags as $ta)
                         @if($tag->id == $ta->id)
                            checked
                            @endif
                        @endforeach>{{$tag->name}}</label>
                        </div>
                    @endforeach
                </div>
            <div class="form-group text-center">
                   <button type="submit"class="btn btn-success">Create Post</button>
            </div>
        </form>
    </div>
</div>
@endsection