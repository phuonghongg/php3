@extends('admin/dashboard')
@section('content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Thêm Thể loại</h4>
        @if (Session::has('success'))
            <p class="text-success ">
                {{Session::get('success')}}
            </p>
        @endif
        <form action="{{route('them-the-loai')}}" class="forms-sample" method="POST"  >
            @csrf
          <div class="form-group">
            <label for="ten">Tên thể loại</label>
            <input type="text" value="{{old('name')}}" name="name" class="form-control" id="ten" placeholder="Tên thể loại">
            @error('name')
                <p class="text-danger">
                    {{$message}}
                </p>
            @enderror
          </div>
          <div class="form-group">
            <label for="ten">Slug thể loại</label>
            <input type="text" value="{{old('slug')}}" name="slug" class="form-control" id="ten" placeholder="Slug thể loại">

            @error('slug')
                <p class="text-danger">
                    {{$message}}
                </p>
            @enderror

          </div>
          <button type="submit" class="btn btn-primary me-2">Submit</button>
          <button class="btn btn-light"><a href="{{url('/admin/the-loai/danh-sach')}}">Thoát</a></button>
        </form>
      </div>
    </div>
  </div>
@endsection

