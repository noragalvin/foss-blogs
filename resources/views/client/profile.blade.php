@extends('client.app')

@section('content')
<div class="wrapper">
    <div class="page-header page-header-xs settings-background" style="background-image: url('../assets/img/sections/joshua-earles.jpg');">
        <div class="filter"></div>
    </div>
    <div class="profile-content section">
        <div class="container">

            <div class="row">
                <div class="col-md-6 ml-auto mr-auto">
                    @if(session()->has("success"))
                        <div class="alert alert-success alert-dismissible fade show">
                            <button type="button" aria-hidden="true" class="close" data-dismiss="alert"
                                    aria-label="Close">
                                <i class="nc-icon nc-simple-remove"></i>
                            </button>
                            <span> {{ session("success") }}</span>
                        </div>
                    @endif
                    @include("common.errors")
                    <form class="settings-form" action="{{ route('postProfile', Auth::user()->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="profile-picture">
                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                    <div class="fileinput-new img-no-padding">
                                        <img id="avatar" src="{{ $user->avatar_url }}" alt="...">
                                    </div>
                                    <div class="fileinput-preview fileinput-exists img-no-padding"></div>
                                    <div>
                                        <span class="btn btn-outline-default btn-file btn-round">
                                            <span class="fileinput-new">Change Photo</span>
                                            <span class="fileinput-exists">Change</span>
                                            <input id="file" type="file" name="file">
                                        </span>
                                        <br />
                                        <a href="#paper-kit" class="btn btn-link btn-danger fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label>First Name</label>
                                    <input type="text" name="first_name" value="{{ $user->first_name }}" class="form-control border-input" placeholder="First Name">
                                </div>
                            </div>

                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label>Last Name</label>
                                    <input type="text" name="last_name" value="{{ $user->last_name }}" class="form-control border-input" placeholder="Last Name">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" value="{{ $user->email }}" class="form-control border-input" placeholder="Email" disabled>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" name="password" class="form-control border-input" placeholder="********">
                                    </div>
                                </div>

                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <label>Password Confirmation</label>
                                        <input type="password" name="password_confirmation" class="form-control border-input" placeholder="********">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-wd btn-info btn-round">Save</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#avatar').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#file").change(function() {
        readURL(this);
    });
</script>
@endpush
