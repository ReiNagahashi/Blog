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
    <form action="{{isset($post)? route('posts.update',['id'=>$post->id]) : route('posts.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        @if(isset($post))
        @method('PUT')
        @endif
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control"value= "{{isset($post) ? $post->title:""}}">
            </div>
            <div class="form-group">
                <label for="content">Content</label>
                <textarea name="content" id="article-ckeditor" cols="30" rows="10" class="form-control">
                        {{isset($post)? $post->content: ''}}
                </textarea>
            </div>
            <div class="form-group">
                 <label for="featured">Featured Image</label>
                <input type="file" name="featured" class="form-control">
            </div>
            <div class="form-group">
                <label for="category">Select Category</label>
                <select name="category_id" id="category" class="form-control">
                   @foreach($categories as $category)
                     <option value="{{$category->id}}">{{$category->name}}</option>
                   @endforeach
                </select>
                <div class="form-group">
                    <label for="tags">Select tags</label>
                    @foreach($tags as $tag)
                        <div class="checkbox">
                        <label><input type="checkbox" name="tags[]" value="{{$tag->id}}">{{$tag->name}}</label>
                        </div>
                    @endforeach
                </div>
            </div>
                <div class="form-group text-center">
                    <button type="submit"class="btn btn-success">
                        {{isset($post)? 'Edit':'Create'}}
                   </button>
               </div>
        </form>
    </div>
</div>
@endsection