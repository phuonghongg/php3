@extends('admin/dashboard')
@section('content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Thêm Quản trị viên</h4>
        @if (Session::has('success'))
            <div class="alert alert-success text-center">
                {{Session::get('success')}}
            </div>
        @endif
        <form action="/admin/them" class="forms-sample" method="POST"  >
            @csrf
          <div class="form-group">
            <label for="ten">Tên người quản trị</label>
            <input type="text" name="name" class="form-control" id="ten" placeholder="Tên người quản trị">
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input type="text" name="email" class="form-control" id="email" placeholder="Email">
          </div>
          <div class="form-group">
            <label for="password">Mật khẩu</label>
            <input type="password" name="password" class="form-control" id="password" placeholder="Password">
          </div>
          <input type="hidden" id="id" name="id">
          <button type="submit" class="btn btn-primary me-2">Submit</button>
          <button class="btn btn-light"><a href="{{url('/admin/the-loai/danh-sach')}}">Thoát</a></button>
        </form>
      </div>
    </div>
  </div>
@endsection

