@extends('layouts.app')
@section('content')

<div class="card">
    <div class="card-header">All Users</div>
    <div class="card-body">
        @if(count($users) > 0)
        <table class="table table-striped">
            <thead>
                <th>Image</th>
                <th>Users</th>
                <th></th>
            </thead> 
            <tbody>
                @foreach($users as $user)
              <tr>
                <td>
                  <img src="{{asset($user->profile->avatar)}}" 
                  alt="{{$user->name}}"height="90px" width="90px" style="border-radius:50%">
                </td>
                <td>
                  {{$user->name}}
                </td>
                <td>
                  @if(!Auth::user()->admin)
                    <a href="{{route('user.admin',['id'=>$user->id])}}" class="btn btn-success">Make Admin</a>
                    @else
                    <a href="{{route('user.not_admin',['id'=>$user->id])}}"
                       class="btn btn-success">Remove Permission</a>
                    @endif
                </td>
                <td>
                <a href="{{route('user.delete',['id'=>$user->id])}}" class="btn btn-danger">Delete</a>
                </td>
              </tr>
              @endforeach
            </tbody>
        </table>
        @else
        <p class="text-center">No User found.</p>
        @endif
    </div>
</div>
@endsection