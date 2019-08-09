@extends('layouts.app')
@section('content')

<div class="card">
        <div class="card-header">{{isset($user)? 'Edit User':'New User'}}</div>
        <div class="card-body">
        @if(count($errors) > 0)
            <ul class="list-group">
                {{-- 1つ目のerrorjはただのオブジェクトなので、その後にファンクションであるallでエラーを表示させるようにしなければならないz --}}
                @foreach($errors->all() as $errors)
            <li class="list-group-item text-danger">{{$errors}}</li>
                @endforeach
            </ul>
        @endif
    <form action="{{isset($user)? route('users.update',['id'=>$user->id]) : route('users.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        @if(isset($user))
        @method('PUT')
        @endif
            <div class="form-group">
                <label for="name">User Name</label>
                <input type="text" name="name" class="form-control"value= "{{isset($user) ? $user->name:""}}">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" name="email" class="form-control"value= "{{isset($user) ? $user->email:""}}">
            </div>

            <div class="form-group">
                 <label for="password">{{isset($user) ? 'New Password':'Password'}}</label>
                 <input type="text" name="password" class="form-control">
            </div>
            <div class="form-group text-center">
                   <button type="submit"class="btn btn-success">
                        {{isset($user)? 'Update User':'Create User'}}
                   </button>
            </div>
        </form>
    </div>
</div>　
@endsection