@extends('client.app')

@section('content')
    <div class="page-header" data-parallax="true" style="background-image: url('../assets/img/sections/david-marcu.jpg');">
        <div class="filter"></div>
        <div class="content-center">
            <div class="container">
                <div class="motto">
                    <h1 class="title">Landing page</h1>
                    <h3 class="description">Start designing your landing page here.</h3>
                    <br />
                    <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" class="btn btn-neutral btn-round"><i class="fa fa-play"></i>Watch video</a>
                    <button type="button" class="btn btn-outline-neutral btn-round">Download</button>
                </div>
            </div>
        </div>

    </div>

    <div class="wrapper">
        <div class="section section-blog">
            @foreach($categories as $key => $category)
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="pull-left">
                                <button class="btn btn-link btn-default btn-move-right btn-sm">{{ $category->name }}  <i class="fa fa-angle-right"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        @foreach($category->posts as $post_key => $post)
                            @if($post_key < 3)
                                <div class="col-md-4">
                                    <div class="card card-blog">
                                        <div class="card-image">
                                            <a href="{{ route('singlePost', $post->id) }}">
                                                <img class="img" src="{{ $post->image_url }}">
                                            </a>
                                        </div>
                                        <div class="card-body">
                                            <h6 class="card-category text-info">{{ $category->name }}</h6>
                                            <h5 class="card-title">
                                                <a href="{{ route('singlePost', $post->id) }}">{{ $post->title  }}</a>
                                            </h5>
                                            <p class="card-description">
                                                {{ $post->short_description }}
                                            </p>
                                            <hr>
                                            <div class="card-footer">
                                                <div class="author">
                                                    <a href="">
                                                        <img src="{{ $post->user->avatar_url }}" alt="..." class="avatar img-raised">
                                                        <span>{{ $post->user->fullName }}</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="pull-right">
                                <a href="{{ route('postsByCategory', ['id' => $category->id]) }}" class="btn btn-link btn-default btn-move-right btn-sm">See more  <i class="fa fa-angle-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <hr/>
                </div>
            @endforeach
        </div>
    </div>
@endsection
