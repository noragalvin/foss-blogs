@extends('admin.app')

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-user">
                    <div class="card-header">
                        <h5 class="card-title">Add Post</h5>
                    </div>
                    <div class="card-body">
                        <!-- Display Validation Errors -->
                        @include('common.errors')
                        <form action="{{ route("posts.store") }}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-md-6 offset-3">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Name</label>
                                        <input type="text" name="name" class="form-control" placeholder="Category name">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 offset-3">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Name</label>
                                        <select name="category_id" id="" class="form-control">
                                            @foreach($categories as $key => $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 offset-3">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Description</label>
                                        <input type="text" name="description" class="form-control" placeholder="Description">
                                    </div>
                                </div>
                            </div>


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
