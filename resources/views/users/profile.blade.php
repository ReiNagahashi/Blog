@extends('layouts.app')
@section('content')

<div class="card">
    <div class="card-header">Update Profile</div> 
    <div class="card-body">
        @if(count($errors) > 0)
            <ul class="list-group">
                {{-- 1つ目のerrorはただのオブジェクトなので、その後にファンクションであるallでエラーを表示させるようにしなければならないz --}}
                @foreach($errors->all() as $errors)
            <li class="list-group-item text-danger">{{$errors}}</li>
                @endforeach
            </ul>
        @endif
    <form action="{{route('profile.update',['id'=>$user->id])}}" method="POST" enctype="multipart/form-data">
        @csrf　
        @method('PUT')
            <div class="form-group">
                <label for="name">Username</label>
            <input type="text" name="name" class="form-control" value="{{$user->name}}">
            </div>
            <div class="form-group">
                 <label for="email">Email</label>
                <input type="text" name="email" class="form-control" value="{{$user->email}}">
            </div>
            <div class="form-group">
                <label for="password">New Password</label>
               <input type="text" name="password" class="form-control">
           </div>
           <div class="form-group">
              <label for="avatar">Upload new avatar</label>
              <input type="file" name="avatar" class="form-control">
            </div>
            <div class="form-group">
                <label for="facebook">Facebook Profile</label>
                <input type="text" name="facebook" class="form-control" value="{{$user->profile->facebook}}">
              </div>
          <div class="form-group">
            <label for="password">About you</label>
            <textarea name="about" id="about" cols="6" rows="6"class="form-control">{{$user->profile->about}}</textarea>
           </div>
            <div class="form-group text-center">
                <button type="submit"class="btn btn-success">Update Post</button>
            </div>
        </form>
    </div>
</div>
@endsection