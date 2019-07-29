@extends('client.app')

@section('content')
<div class="wrapper">
    <div class="main">
        <div class="section">
            <div class="container">
                <h3>Add Product</h3>
                <form method="POST" action="{{ route('postPost') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-6 col-sm-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Category</label>
                                <select name="category_id" id="" class="form-control">
                                    @foreach($categories as $key => $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <h6>Title <span class="icon-danger">*</span></h6>
                                <input name="title" type="text" class="form-control border-input" placeholder="enter the product tagline here...">
                            </div>
                            <div class="form-group">
                                <h6>Short Description <span class="icon-danger">*</span></h6>
                                <input name="short_description" type="text" class="form-control border-input" placeholder="enter the product tagline here...">
                            </div>
                            <div class="form-group">
                                <h6>Content</h6>
								<textarea name="content" class="form-control" id="summary-ckeditor" name="summary-ckeditor"></textarea>
                            </div>
                            <div class="form-group">
                                <h6>Image URL <span class="icon-danger">*</span></h6>
                                <input name="file" type="file" class="form-control border-input">
                            </div>
                        </div>
                    </div>


                    <div class="row buttons-row">
                        <div class="col-md-2"></div>
                        <div class="col-md-4 col-sm-4">
                            <a href="{{ route('getUserPosts', Auth::user()->id ) }}" class="btn btn-outline-danger btn-block btn-round">Cancel</a>
                        </div>
                        <div class="col-md-4 col-sm-4">
                            <button type="submit" class="btn btn-outline-primary btn-block btn-round">Save</button>
                        </div>
                    </div>
                </form>
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
