@extends('admin/dashboard')
@section('content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Sửa thể loại </h4>

        <form action="/admin/the-loai/sua/{{$genre->slug}}" class="forms-sample" method="POST"  >
            @csrf
          <div class="form-group">
            <label for="ten">Tên thể loại</label>
            <input type="text" name="name" class="form-control" value="{{$genre->name}}" id="ten" placeholder="Tên thể loại">
            @error('name')
                <p class="text-danger">
                    {{$message}}
                </p>
            @enderror
        </div>
          <div class="form-group">
            <label for="ten">Slug thể loại</label>
            <input type="text" name="slug" class="form-control" value="{{$genre->name}}" id="ten" placeholder="Tên thể loại">
            @error('slug')
                <p class="text-danger">
                    {{$message}}
                </p>
            @enderror
        </div>
          <button type="submit" class="btn btn-primary me-2">Sửa</button>
          <button class="btn btn-light"><a href="{{url('/admin/the-loai/danh-sach')}}">Thoát</a></button>
        </form>
      </div>
    </div>
  </div>
@endsection

