@extends('admin.app')

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-user">
                    <div class="card-header">
                        <h5 class="card-title">Add User</h5>
                    </div>
                    <div class="card-body">
                        <!-- Display Validation Errors -->
                        @include('common.errors')
                        <form action="{{ route("users.store") }}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-md-6 offset-3">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Email address</label>
                                        <input type="email" name="email" class="form-control" placeholder="Email">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 pr-1 offset-3">
                                    <div class="form-group">
                                        <label>First Name</label>
                                        <input type="text" name="first_name" class="form-control" placeholder="Company">
                                    </div>
                                </div>
                                <div class="col-md-3 pl-1">
                                    <div class="form-group">
                                        <label>Last Name</label>
                                        <input type="text" name="last_name" class="form-control" placeholder="Last Name">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 pr-1 offset-3">
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" name="password" class="form-control" placeholder="******">
                                    </div>
                                </div>
                                <div class="col-md-3 pl-1">
                                    <div class="form-group">
                                        <label>Confirmation Password</label>
                                        <input type="password" name="password_confirmation" class="form-control" placeholder="******">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 offset-3">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Type</label>
                                        <select name="type" class="form-control">
                                            <option value="0">Admin</option>
                                            <option value="1">User</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
{{--                            <div class="row">--}}
{{--                                <div class="col-md-4 offset-3">--}}
{{--                                    <input type="file" name="file" class="form-control">--}}
{{--                                </div>--}}
{{--                            </div>--}}
                            <div class="row">
                                <div class="update ml-auto mr-auto">
                                    <button type="submit" class="btn btn-primary btn-round">Add</button>
                                </div>
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

    </script>
@endpush
