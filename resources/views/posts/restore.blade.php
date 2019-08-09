{{-- @extends('layouts.app')
@section('content')

<div class="container">
    <h1>これらを復元しますか？</h1>
    @foreach($garbages as $garbage)
    <div class="row">
        <div class="card col-md-12">
            <div class="card-header">Post Details - {{$garbage->title}}</div>
                <img src="{{ asset('uploads/posts/'.$garbage->featured_image)}}" alt="{{$garbage->title}}" style ="border-radius:50%" height="150px" width="150px">
                    <div class="card-body">
                        <div class="card-title">{{$garbage->title}}</div>
                        <div class="card-text">{{$garbage->content}}</div>
                    </div>
                    <form action="{{route('post.restore',['id' => $garbage->id])}}" method="POST">
                      @csrf
                        <button type="submit" class="btn btn-info">復元する</button>
                        @endforeach
                     </form>            
                     

        </div>
    </div>
</div>

@endsection --}}