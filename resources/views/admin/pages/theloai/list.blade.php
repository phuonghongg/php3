@extends('admin/dashboard')
@section('content')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Danh sách truyện</h4>
            <p class="card-description">
                @if (Session::has('success'))
                <div class="alert alert-success text-center">
                    {{Session::get('success')}}
                </div>
                @endif
            </p>
        <table class="table table-striped">
        <thead>
            <tr>
            <th>
                Tên thể loại
            </th>
            <th>
                Ngày thêm
            </th>
            <th>
                Ngày cập nhật
            </th>
            <th>
            </th>
            </tr>
        </thead>
        <tbody>

            @foreach ($genre as $item)
            <tr>
                <td>
                    {{$item->name}}
                </td>
                <td>
                    {{$item->created_at}}
                </td>
                <td>
                    {{$item->updated_at}}
                </td>
                <td>
                <button type="button" class="btn btn-dark btn-icon-text"><a href="{{ url('/admin/the-loai/sua/'.$item->slug) }}">Sửa</a></button>
                <button type="button" class="btn btn-warning btn-icon-text"><a href="{{ url('/admin/the-loai/xoa/'.$item->slug) }}">Xóa</a></button>
                </td>
            </tr>
            @endforeach
        </tbody>
        </table>
    </div>
    </div>
</div>
@endsection

