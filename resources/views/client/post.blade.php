@extends('client.app')

@section('content')
<div class="page-header" data-parallax="true" style="background-image: url('{{ $post->image_url }}')">
    <div class="filter"></div>
    <div class="content-center">
        <div class="motto">
            <h1 class="title-uppercase text-center">{{ $post->title }}</h1>
            <h3 class="text-center">{{ $post->short_description }}</h3>
            <br/>
            <div class="fb-share-button" data-href="{{ url('/post/' . $post->id) }}" data-layout="button_count" data-size="small"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Share</a></div>
        </div>
    </div>
</div>

<div class="wrapper">
    <div class="main">
        <div class="section section-white">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 ml-auto mr-auto text-center title">
                        <h2>{{ $post->title }}</h2>
                        <h3 class="title-uppercase"><small>{{ $post->short_description }}</small></h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-10 ml-auto mr-auto">
                        <div class="text-center">
                            <span class="label label-warning main-tag">{{ $post->category->name }}</span>
                            <h6 class="title-uppercase">{{ $post->created_at }}</h6>
                        </div>
                    </div>
                    <div class="col-md-8 ml-auto mr-auto">
                        <div class="article-content">
                            {{ $post->content }}
                        </div>
                        <br/>
                        <hr>
                        <div class="container">
                            <div class="row">
                                <div class="media">
                                    <a class="pull-left" href="#paper-kit">
                                        <div class="avatar big-avatar">
                                            <img class="media-object" alt="64x64" src="{{ $post->user->avatar_url }}">
                                        </div>
                                    </a>
                                    <div class="media-body">
                                        <h4 class="media-heading">{{ $post->user->name }}</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="comments media-area">
                                    <h3 class="text-center">Comments</h3>
                                    <div class="media">
                                        <div class="fb-comments" data-href="https://developers.facebook.com/docs/plugins/comments#configurator" data-width="" data-numposts="5"></div>
                                    </div> <!-- end media -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.3"></script>
@endpush
