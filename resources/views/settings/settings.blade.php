@extends('layouts.app')
@section('content')

<div class="card">
        <div class="card-header">Edit Setting</div>
        <div class="card-body">
        @if(count($errors) > 0)
            <ul class="list-group">
                {{-- 1つ目のerrorjはただのオブジェクトなので、その後にファンクションであるallでエラーを表示させるようにしなければならないz --}}
                @foreach($errors->all() as $errors)
            <li class="list-group-item text-danger">{{$errors}}</li>
                @endforeach
            </ul>
        @endif
    <form action="{{route('settings.update')}}" method="POST">
        @csrf
            <div class="form-group">
                <label for="site_name">Site Name</label>
                <input type="text" name="site_name" class="form-control"value= "{{$settings->site_name}}">
            </div>
            <div class="form-group">
                <label for="contact_number">Contact Number</label>
                <input type="text" name="contact_number" class="form-control"value= "{{$settings->contact_number}}">
            </div>
            <div class="form-group">
                <label for="contact_email">Contact Email</label>
                <input type="text" name="contact_email" class="form-control"value= "{{$settings->contact_email}}">
           </div>
           <div class="form-group">
                <label for="address">Address</label>
                <input type="text" name="address" class="form-control"value= "{{$settings->address}}">
           </div>

            <div class="form-group text-center">
                <button type="submit"class="btn btn-success">Update Setting</button>
            </div>
        </form>
    </div>
</div>
@endsection