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
                        <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-md-6 offset-3">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Category</label>
                                        <select name="category_id" id="" class="form-control">
                                            @foreach($categories as $key => $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 pr-1 offset-3">
                                    <div class="form-group">
                                        <h6>Title <span class="icon-danger">*</span></h6>
                                        <input name="title" type="text" class="form-control border-input" placeholder="Enter the title here...">
                                    </div>
                                </div>
                                <div class="col-md-3 pl-1">
                                    <div class="form-group">
                                        <h6>Short Description <span class="icon-danger">*</span></h6>
                                        <input name="short_description" type="text" class="form-control border-input" placeholder="Enter the short description here...">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 pr-1 offset-3">
                                    <div class="form-group">
                                        <h6>Content</h6>
                                        <textarea name="content" class="form-control" id="summary-ckeditor" name="summary-ckeditor"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3"></div>
                                <div class="col-md-3 pl-1">
                                    <div class="form-group">
                                        <h6>Image URL <span class="icon-danger">*</span></h6>
                                        <input style="opacity: 1; position:initial" name="file" type="file" class="form-control border-input">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="update ml-auto mr-auto">
                                    <button type="submit" class="btn btn-primary btn-round">Save</button>
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
<script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
<script>
    CKEDITOR.replace( 'summary-ckeditor' );
</script>
@endpush
