<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    {{-- FontAwesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css">
    <!-- Styles -->
    <link  href="{{asset('css/app.css')}}" rel="stylesheet">
    <link  href="{{asset('css/toastr.min.css')}}" rel="stylesheet">

</head>
<body>
    <div id="app">
        <div class="container py-4">
                @include('inc.navbar')
                @if(Session::has('success'))
                <div class="alert alert-success">
                    {{session()->get('success')}}
                </div>
                @endif
            <div class="row">
                <div class="col-md-4">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <a href="{{route('home')}}">Home</a>
                        </li>
                        <li class="list-group-item">
                             <a href="{{route('posts.index')}}">Posts</a>
                        </li>
                        <li class="list-group-item">
                              <a href="{{route('posts.create')}}">New Posts</a>
                        </li>
                        {{-- <li class="list-group-item">
                                <a href="{{route('posts.restore')}}">Restore</a>
                          </li> --}}
                          <li class="list-group-item">
                            <a href="{{route('category.index')}}">Categories</a>
                        </li>
                        <li class="list-group-item">
                            <a href="{{route('category.create')}}">New Categories</a>
                        </li>
                        <li class="list-group-item">
                            <a href="{{route('tag.index')}}">Tags</a>
                        </li>
                        <li class="list-group-item">
                            <a href="{{route('tag.create')}}">New Tags</a>
                        </li>
                        <li class="list-group-item">
                             <a href="{{route('posts.trashed')}}">Trashed</a>
                        </li>

                 {{-- @if(Auth::user()->admin) --}}
                    <li class="list-group-item">
                        <a href="{{route('settings')}}">Settings</a>
                    </li>
                    <li class="list-group-item">
                        <a href="{{route('users')}}">Users</a>
                    </li>
                    <li class="list-group-item">
                        <a href="{{route('user.profile')}}">My Profile</a>
                    </li>
                    </li>
                    <li class="list-group-item">
                        <a href="{{route('users.create')}}">New Users</a>
                    </li>
                    {{-- @endif --}}
                    </ul>
                </div>
                <div class="col-md-8">
                        @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif　
                    @if (session('info'))
                    <div class="alert alert-info" role="alert">
                        {{ session('info') }}
                    </div>
                @endif
                @yield('content')
                </div>
            </div>
        </div>
    </div>
    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'article-ckeditor' );
    </script>
</body>
</html>
