@extends('layouts.frontend')
@section('page')
<div class="container">
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-8">
                <article class="hentry post post-standard has-post-thumbnail sticky">

                        <div class="post-thumb">
                        <img src="{{asset('uploads/posts/'.$first_post->featured_image)}}" alt="{{$first_post->title}}">
                            <div class="overlay"></div>
                        <a href="" class="link-image js-zoom-image">
                                <i class="seoicon-zoom"></i>
                            </a>
                            <a href="#" class="link-post">
                                <i class="seoicon-link-bold"></i>
                            </a>
                        </div>

                        <div class="post__content">

                            <div class="post__content-info">

                                    <h2 class="post__title entry-title ">
                                      <a href="{{route('post.single',['slug' => $first_post->slug])}}">{{$first_post->title}}</a>
                                    </h2>

                                    <div class="post-additional-info">

                                        <span class="post__date">

                                            <i class="seoicon-clock"></i>

                                            <time class="published" datetime="2016-04-17 12:00:00">
                                                    {{$first_post->created_at->toFormattedDateString()}}                                            </time>

                                        </span>

                                        <span class="category">
                                            <i class="seoicon-tags"></i>
                                            {{-- ここのファーストポスト変数はフロントエンドコントローラーから出力した物 --}}
                                            <a href="#">{{$first_post->category->name}}</a>
                                        </span>

                                        <span class="post__comments">
                                            <a href="#"><i class="fa fa-comment-o" aria-hidden="true"></i></a>
                                            6
                                        </span>

                                    </div>
                            </div>
                        </div>

                </article>
            </div>
            <div class="col-lg-2"></div>
        </div>

        <div class="row">
            <div class="col-lg-6">
                <article class="hentry post post-standard has-post-thumbnail sticky">

                        <div class="post-thumb">
                                <img src="{{asset('uploads/posts/'.$second_post->featured_image)}}" alt="{{$second_post->title}}">
                                <div class="overlay"></div>
                            <a href="app/img/2.png" class="link-image js-zoom-image">
                                <i class="seoicon-zoom"></i>
                            </a>
                            <a href="#" class="link-post">
                                <i class="seoicon-link-bold"></i>
                            </a>
                        </div>

                        <div class="post__content">

                            <div class="post__content-info">

                                    <h2 class="post__title entry-title ">
                                        <a href="{{route('post.single',['slug' => $second_post->slug])}}">{{$second_post->title}}</a>
                                    </h2>

                                    <div class="post-additional-info">

                                        <span class="post__date">

                                            <i class="seoicon-clock"></i>

                                            <time class="published" datetime="2016-04-17 12:00:00">
                                                    {{$second_post->created_at->toFormattedDateString()}}                                            </time>
                                            </time>

                                        </span>

                                        <span class="category">
                                            <i class="seoicon-tags"></i>
                                            <a href="#">{{$second_post->category->name}}</a>
                                        </span>

                                        <span class="post__comments">
                                            <a href="#"><i class="fa fa-comment-o" aria-hidden="true"></i></a>
                                            6
                                        </span>

                                    </div>
                            </div>
                        </div>

                </article>
            </div>
            <div class="col-lg-6">
                <article class="hentry post post-standard has-post-thumbnail sticky">

                        <div class="post-thumb">
                                <img src="{{asset('uploads/posts/'.$third_post->featured_image)}}" alt="{{$third_post->title}}">
                            <div class="overlay"></div>
                            <a href="app/img/3.jpg" class="link-image js-zoom-image">
                                <i class="seoicon-zoom"></i>
                            </a>
                            <a href="#" class="link-post">
                                <i class="seoicon-link-bold"></i>
                            </a>
                        </div>

                        <div class="post__content">

                            <div class="post__content-info">

                                    <h2 class="post__title entry-title ">
                                        <a href="{{route('post.single',['slug' => $third_post->slug])}}">{{$third_post->title}}</a>
                                    </h2>

                                    <div class="post-additional-info">

                                        <span class="post__date">

                                            <i class="seoicon-clock"></i>

                                            <time class="published" datetime="2016-04-17 12:00:00">
                                                    {{$third_post->created_at->toFormattedDateString()}}                                            </time>
                                            </time>

                                        </span>

                                        <span class="category">
                                            <i class="seoicon-tags"></i>
                                            <a href="#">{{$third_post->category->name}}</a>
                                        </span>

                                        <span class="post__comments">
                                            <a href="#"><i class="fa fa-comment-o" aria-hidden="true"></i></a>
                                            6
                                        </span>

                                    </div>
                            </div>
                        </div>

                </article>
            </div>
        </div>
    </div>


    <div class="container-fluid">
        <div class="row medium-padding120 bg-border-color">
            <div class="container">
                <div class="col-lg-12">
                <div class="offers">
                    <div class="row">
                        <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                            <div class="heading">
                            <h4 class="h1 heading-title">{{$cats->name}}</h4>
                                <div class="heading-line">
                                    <span class="short-line"></span>
                                    <span class="long-line"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="case-item-wrap">
                            @foreach($cats->posts as $post)
                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                <div class="case-item">
                                    <div class="case-item__thumb">
                                      <img src="{{asset('uploads/posts/'.$post->featured_image)}}" alt="{{$post->title}}">
                                    </div>
                                <h6 class="case-item__title"><a href="{{route('post.single',['single' => $post->slug])}}">{{$post->title}}</a></h6>
                                </div>
                              </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="padded-50"></div>
                <div class="offers">
                    <div class="row">
                        <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                            <div class="heading">
                                <h4 class="h1 heading-title">{{$daily->name}}</h4>
                                <div class="heading-line">
                                    <span class="short-line"></span>
                                    <span class="long-line"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- ここから宿題をやってみよう --}}
                    <div class="row">
                        <div class="case-item-wrap">
                            @foreach($daily->posts as $post)
                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                <div class="case-item">
                                    <div class="case-item__thumb">
                                            <img src="{{asset('uploads/posts/'.$post->featured_image)}}" alt="{{$post->title}}">
                                        </div>
                                        <h6 class="case-item__title"><a href="{{route('post.single',['single' => $post->slug])}}">{{$post->title}}</a></h6>
                                    </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
             <div class="padded-50"></div>
            </div>
            </div>
        </div>
    </div>
@endsection