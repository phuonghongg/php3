@extends('admin/dashboard')
@section('content')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Danh sách người dùng</h4>
        <p class="card-description">
            @if (Session::has('success'))
            <div class="alert alert-success text-center">
                {{Session::get('success')}}
            </div>
            @endif
        </p>
        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>
                  Tên người dùng
                </th>
                <th>
                  Email
                </th>
                <th>
                  Quyền hạn
                </th>
                <th>
                  Ngày tham gia
                </th>
              </tr>
            </thead>
            <tbody>

              @foreach ($user as $item)
              <tr>
                <td>
                  {{$item->name}}
                </td>
                <td>
                    {{$item->email}}
                </td>
                <td>
                    <label class="badge badge-success">Quản trị viên</label>
                  </td>
                <td>
                    {{$item->created_at}}
                </td>
                <td>
                    <button type="button" class="btn btn-warning btn-icon-text"><a href="{{ url('/admin/xoa/'.$item->id) }}">Xóa</a></button>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

@endsection
