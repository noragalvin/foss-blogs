@extends('client.app')

@section('content')
    <div class="wrapper">
        <div class="page-header" style="background-image: url('../assets/img/sections/bruno-abatti.jpg');">
            <div class="filter"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-6 ml-auto mr-auto">
                        <div class="card card-register">
                            <h3 class="card-title">Welcome</h3>
                            @if(session()->has("success"))
                                <div class="alert alert-success">
                                    <div class="container" style="margin-top: 0;">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <i class="nc-icon nc-simple-remove"></i>
                                        </button>
                                        <span>{{ session("success") }}</span>
                                    </div>
                                </div>
                            @endif
                            <form class="register-form" action="{{ route('postLogin') }}" method="POST">
                                @csrf
                                <label>Email</label>
                                <input name="email" type="email" class="form-control no-border" placeholder="Email">

                                <label>Password</label>
                                <input name="password" type="password" class="form-control no-border" placeholder="Password">
                                @include("common.errors")
                                <button class="btn btn-danger btn-block btn-round">Register</button>
                            </form>
                            <div class="forgot">
                                <a href="#paper-kit" class="btn btn-link btn-danger">Forgot password?</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection