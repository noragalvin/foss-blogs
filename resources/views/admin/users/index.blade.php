@extends('admin.app')

@section('content')
<div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title"> Manage Users</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <th>
                        ID
                      </th>
                      <th>
                        Name
                      </th>
                      <th>
                        Email
                      </th>
                      <th>
                        Type
                      </th>
                      <th>
                        Options
                      </th>
                    </thead>
                    <tbody>
                      @foreach($users as $key => $user)
                      <tr>
                        <td>
                        {{ (($users->currentPage() - 1 ) * $users->perPage()) + ($key+1) }}
                        </td>
                        <td>
                          {{ $user->name }}
                        </td>
                        <td>
                          {{ $user->email }}
                        </td>
                        <td>
                          {{ $user->type }}
                        </td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <button type="button" class="btn btn-secondary btn-edit" data-href="/manage/users/{{$user->id}}"><i class="nc-icon nc-scissors"></i></button>
                                <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#modalDelete{{$user->id}}"><i class="nc-icon nc-simple-remove"></i></button>
                                <!-- Modal -->
                                <div id="modalDelete{{$user->id}}" class="modal fade" role="dialog">
                                    <div class="modal-dialog">

                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header" style="display: block;">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Xóa</h4>
                                        </div>
                                        <div class="modal-body">
                                            <p>Bạn có chắc chắn muốn xóa?</p>
                                        </div>
                                        <div class="modal-footer">
                                        <form action="/manage/users/{{$user->id}}" method="post">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                                            <button type="submit" class="btn btn-danger">Xóa</button>
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
              </div>
            </div>
          </div>
        </div>
      </div>

<!-- Modal thêm thương hiệu -->
<div class="modal" id="addModal" role="dialog" aria-labelledby="addModalLabel" aria-hidden="false">
    <div class="modal-dialog" role="document">
        <form id="addForm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">Add User</h5>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger message-error" role="alert"></div>
                <input type="hidden" name="id" />
                <div class="form-group">
                    <label class="col-form-label">Name:</label>
                    <input name="name" type="text" class="form-control form-control-sm"
                        autocomplete="off"/>
                </div>
                <div class="form-group">
                    <label class="col-form-label">Email:</label>
                    <input name="email" type="text" class="form-control form-control-sm"
                        autocomplete="off"/>
                </div>
                <div class="form-group">
                    <label class="col-form-label">Type:</label>
                    <select name="type" class="form-control form-control-sm" autocomplete="off">
                        <option value="0">Admin</option>
                        <option value="1">User</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                <button type="submit" class="btn btn-primary">Thêm</button>
            </div>
        </div>
        </form>
    </div>
</div>
<!-- Modal sửa thương hiệu -->
<div class="modal" id="editModal" role="dialog" aria-labelledby="editModalLabel" aria-hidden="false">
    <div class="modal-dialog" role="document">
        <form id="editForm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Update User</h5>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger message-error" role="alert"></div>
                <input type="hidden" name="id" />
                <div class="form-group">
                    <label class="col-form-label">Name:</label>
                    <input name="name" type="text" class="form-control form-control-sm"
                        autocomplete="off"/>
                </div>
                <div class="form-group">
                    <label class="col-form-label">Email:</label>
                    <input name="email" type="text" class="form-control form-control-sm"
                        autocomplete="off"/>
                </div>
                <div class="form-group">
                    <label class="col-form-label">Type:</label>
                    <select name="type" class="form-control form-control-lg" autocomplete="off">
                        <option value="0" selected>Admin</option>
                        <option value="1">User</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </div>
        </form>
    </div>
</div>

@endsection

@push('scripts')
<script>
    //Nhấn nút sửa
    $('.btn-edit').click(function(e){
        e.preventDefault();
        resetFormModal($(this).data('href'));

        //Điền dữ liệu mặc định
        var row = $(this).parent().parent().parent();
        var col = row.find('td');
        console.log(row);
        console.log(col);
        $('#editForm input[name="name"]').val(col[1].innerText);
        $('#editForm input[name="email"]').val(col[2].innerText);
        $('#editForm select[name="type"]').val($(col[3]).get(0).innerText === "User" ? 1 : 0);

        $('#editModal').modal({
            backdrop: 'static',
            show: true
        });
    });
</script>
@endpush
