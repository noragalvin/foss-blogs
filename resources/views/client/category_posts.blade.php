@extends('client.app')

@section('content')
    <div class="page-header" data-parallax="true" style="background-image: url('../assets/img/sections/david-marcu.jpg');">
        <div class="filter"></div>
        <div class="content-center">
            <div class="container">
                <div class="motto">
                    <h1 class="title">{{ $category->name }}</h1>
                    <h3 class="description">{{ $category->description }}</h3>
                </div>
            </div>
        </div>
    </div>
    <div class="wrapper">
        <div class="main">
            <div class="section section-white">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 ml-auto mr-auto text-center title">
                            <h2>{{ $category->name }}</h2>
                        </div>
                    </div>
                    <div class="article">
                        <div class="row">
                        @foreach($posts as $key => $post)
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
                                                    <a href="#pablo">
                                                        <img src="{{ $post->user->avatar_url }}" alt="..." class="avatar img-raised">
                                                        <span>{{ $post->user->name }}</span>
                                                    </a>
                                                </div>
                                                <div class="stats">
                                                    <i class="fa fa-clock-o" aria-hidden="true"></i> 5 min read
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        @endforeach
                        </div>
                    </div>

                    <hr />
                    <div class="row">
                        <div class="col-md-12">
                            <div class="pull-left">
                                <button class="btn btn-link btn-default btn-move-left btn-sm"> <i class="fa fa-angle-left"></i> Older Posts</button>
                            </div>
                            <div class="pull-right">
                                <button class="btn btn-link btn-default btn-move-right btn-sm">Newer Posts  <i class="fa fa-angle-right"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
