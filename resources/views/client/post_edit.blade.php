@extends('client.app')

@section('content')
<div class="wrapper">
    <div class="main">
        <div class="section">
            <div class="container">
                <h3>Add Product</h3>
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
                <form method="POST" action="{{ route('updatePost', $post->id) }}" enctype="multipart/form-data">
                    @csrf
                    {{ method_field('PUT') }}
                    <div class="row">
                        <div class="col-md-5 col-sm-5">
                            <h6>Product Image</h6>
                            <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                              <div class="fileinput-new thumbnail img-no-padding" style="max-width: 370px; max-height: 250px;">
                                <img src="{{ $post->image_url }}" alt="...">
                              </div>
                              <div class="fileinput-preview fileinput-exists thumbnail img-no-padding" style="max-width: 370px; max-height: 250px;"></div>
                              <div>
                                <span class="btn btn-outline-default btn-round btn-file">
                                    <span class="fileinput-new">Select image</span>
                                    <span class="fileinput-exists">Change</span>
                                    <input type="file" name="file">
                                </span>
                                <a href="#paper-kit" class="btn btn-link btn-danger fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                              </div>
                            </div>

                        </div>

                        <div class="col-md-7 col-sm-7">
                            <div class="form-group">
                                <h6>Title <span class="icon-danger">*</span></h6>
                                <input value="{{ $post->title }}" name="title" type="text" class="form-control border-input" placeholder="Enter the title...">
                            </div>
                            <div class="form-group">
                                <h6>Category <span class="icon-danger">*</span></h6>
                                <select name="category_id" class="form-control border-input">
                                    @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ $category->id == $post->category_id ? "selected" : "" }}>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <h6>Short Description <span class="icon-danger">*</span></h6>
                                <input value="{{ $post->short_description }}" name="short_description" type="text" class="form-control border-input" placeholder="Enter the short description here...">
                            </div>
                            <div class="form-group">
                                <h6>Content</h6>
								<textarea name="content" id="summary-ckeditor" class="form-control textarea-limited" rows="13">{{ $post->content }}</textarea>

                            </div>
                        </div>
                    </div>

                    <div class="row buttons-row">
                        <div class="col-md-2 col-sm-2">

                        </div>
                        <div class="col-md-4 col-sm-4">
                            <a href="{{ route('getUserPosts', Auth::user()->id ) }}" class="btn btn-outline-danger btn-block btn-round">Cancel</a>
                        </div>
                        <div class="col-md-4 col-sm-4">
                            <button type="submit" class="btn btn-outline-primary btn-block btn-round">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
<script src="/vendor/unisharp/laravel-ckeditor/adapters/jquery.js"></script>
<script>
    CKEDITOR.replace( 'summary-ckeditor' );
    $("body").addClass("add-product");
</script>
@endpush
