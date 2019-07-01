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
                            <form class="register-form" action="{{ route('postRegister') }}" method="POST">
                                @csrf
                                <label>Email</label>
                                <input name="email" type="email" class="form-control no-border" placeholder="Email">

                                <label>First Name</label>
                                <input name="first_name" type="text" class="form-control no-border" placeholder="Email">

                                <label>Last Name</label>
                                <input name="last_name" type="text" class="form-control no-border" placeholder="Email">

                                <label>Password</label>
                                <input name="password" type="password" class="form-control no-border" placeholder="*******">

                                <label>Password Confirmation</label>
                                <input name="password_confirmation" type="password" class="form-control no-border" placeholder="*******">
                                @include('common.errors')
                                <button type="submit" class="btn btn-danger btn-block btn-round">Register</button>
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