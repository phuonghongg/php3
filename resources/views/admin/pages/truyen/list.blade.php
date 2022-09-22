@extends('admin/dashboard')
@section('content')
<div class="col-lg-12 grid-margin stretch-card">
    @if (Session::has('success'))
            <div class="alert alert-success text-center">
                {{Session::get('success')}}
            </div>
        @endif
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
                Ảnh
            </th>
            <th>
                Tên truyện
            </th>
            <th>
            Tác giả
            </th>
            <th>
                Trạng thái
            </th>
            <th>
                Nguồn
            </th>
            <th>
            </th>
            </tr>
        </thead>
        <tbody>

            @foreach ($list as $item)
            <tr>
                <td class="py-1">
                <img src="{{$item->url_img}}" alt="image"/>
                </td>
                <td>
                    {{$item->name}}
                </td>
                <td>
                    {{$item->author}}
                </td>
                <td>
                    @if ($item->status == 0)
                        <label class="badge badge-warning">Đang ra</label>
                    @else
                        <label class="badge badge-success">Hoàn thành</label>
                    @endif
                    {{-- badge badge-success hoàn thành --}}
                </td>
                <td>
                    {{$item->source}}
                </td>
                <td>
                <button type="button" class="btn btn-dark btn-icon-text"><a href="{{ url('/admin/truyen/sua/'.$item->slug) }}">Sửa</a></button>
                <button type="button" class="btn btn-warning btn-icon-text"><a href="{{ url('/admin/truyen/xoa/'.$item->slug) }}">Xóa</a></button>
                </td>
            </tr>
            @endforeach
        </tbody>
        </table>
    </div>
    </div>
</div>
@endsection

