@extends('admin.app')

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <a class="btn btn-primary" href="{{ route("posts.create") }}">
                            Add Post
                        </a>
                        <h4 class="card-title"> Manage Posts</h4>
                    </div>
                    <div class="card-body">
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
                        <div class="table-responsive">
                            <table class="table">
                                <thead class=" text-primary">
                                <th>
                                    ID
                                </th>
                                <th>
                                    Category
                                </th>
                                <th>
                                    Author
                                </th>
                                <th>
                                    Title
                                </th>
                                <th>
                                    Description
                                </th>
                                <th>
                                    Options
                                </th>
                                </thead>
                                <tbody>
                                @foreach($posts as $key => $post)
                                    <tr>
                                        <td>
                                            {{ (($posts->currentPage() - 1 ) * $posts->perPage()) + ($key+1) }}
                                        </td>
                                        <td>
                                            {{ $post->category->name }}
                                        </td>
                                        <td>
                                            {{ $post->user->fullName }}
                                        </td>
                                        <td>
                                            {{ $post->title }}
                                        </td>
                                        <td>
                                            {{ $post->short_description }}
                                        </td>
                                        <td class="d-none">
                                            {{ $post->image_url }}
                                        </td>
                                        <td class="d-none">
                                            {{ $post->content }}
                                        </td>
                                        <td class="d-none">
                                            {{ $post->category_id }}
                                        </td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <button type="button" class="btn btn-secondary btn-edit"
                                                        data-href="{{ route("posts.update", ["id" => $post->id]) }}"><i
                                                            class="nc-icon nc-scissors"></i></button>
                                                <button type="button" class="btn btn-secondary" data-toggle="modal"
                                                        data-target="#modalDelete{{$post->id}}"><i
                                                            class="nc-icon nc-simple-remove"></i></button>

                                                <!-- Modal -->
                                                <div id="modalDelete{{$post->id}}" class="modal fade" role="dialog">
                                                    <div class="modal-dialog">

                                                        <!-- Modal content-->
                                                        <div class="modal-content">
                                                            <div class="modal-header" style="display: block;">
                                                                <button type="button" class="close"
                                                                        data-dismiss="modal">&times;
                                                                </button>
                                                                <h4 class="modal-title">Xóa</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>Bạn có chắc chắn muốn xóa?</p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <form action="{{ route('posts.destroy', ['id' => $post->id]) }}"
                                                                      method="post">
                                                                    {{ csrf_field() }}
                                                                    {{ method_field('DELETE') }}
                                                                    <button type="button" class="btn btn-default"
                                                                            data-dismiss="modal">Đóng
                                                                    </button>
                                                                    <button type="submit" class="btn btn-danger">Xóa
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{ $posts->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal edit -->
    <div class="modal" id="editModal" role="dialog" aria-labelledby="editModalLabel" aria-hidden="false">
        <div class="modal-dialog" role="document">
            <form id="editForm" method="POST" enctype="multipart/form-data">
                @csrf
                {{ method_field('PUT') }}
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel">Update Category</h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="author text-center">
                            <a href="#">
                                <img width="300" height="auto" id="avatar" class="avatar border-gray" src="" alt="...">
                                <input type="file" class="d-none" name="file" id="file">
                            </a>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
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
                                    <input style="opacity: 1; position:initial" name="file" type="file" class="form-control border-input">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection

@push('scripts')
    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script src="/vendor/unisharp/laravel-ckeditor/adapters/jquery.js"></script>
    <script>

        // $('.textarea').ckeditor(); // if class is prefered.
    </script>
    <script>
        // Click edit button
        $('.btn-edit').click(function (e) {
            e.preventDefault();
            resetFormModal($(this).data('href'));

            // Fill default value
            var row = $(this).parent().parent().parent();
            var col = row.find('td');
            console.log(row);
            console.log(col);
            $('#editForm select[name="category_id"]').val(col[7].innerText.trim());
            $('#editForm input[name="title"]').val(col[3].innerText.trim());
            $('#editForm input[name="short_description"]').val(col[4].innerText.trim());
            $('#editForm textarea[name="content"]').val(col[6].innerText.trim());
            $('#editForm textarea[name="content"]').ckeditor(col[6].innerText.trim());
            $('#editForm #avatar').attr("src", `${col[5].innerText.trim()}`)
            $('#editModal').modal({
                backdrop: 'static',
                show: true,
                keyboard: false
            });
        });

        $("#avatar").click(function(e) {
            e.preventDefault();
            $("#file").trigger("click");
        })

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
