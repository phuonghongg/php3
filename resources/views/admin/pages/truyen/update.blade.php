@extends('admin/dashboard')
@section('content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Sửa truyện truyện</h4>
        @if (Session::has('success'))
            <div class="alert alert-success text-center">
                {{Session::get('success')}}
            </div>
        @endif
        <form action="/admin/truyen/sua/{{$truyen->slug}}" class="forms-sample" method="POST"  >
            @csrf
          <div class="form-group">
            <label for="ten">Tên truyện</label>
            <input type="text" name="name" class="form-control" id="ten" value="{{$truyen->name}}" placeholder="Tên truyện">
            @error('name')
                <p class="text-danger">
                    {{$message}}
                </p>
            @enderror
          </div>
          <div class="form-group">
            <label for="ten">Slug truyện</label>
            <input type="text" name="slug" class="form-control" id="ten" value="{{$truyen->slug}}" placeholder="Tên truyện">
            @error('slug')
                <p class="text-danger">
                    {{$message}}
                </p>
            @enderror
          </div>
          <div class="form-group">
            <label for="exampleInputName1">Tác giả</label>
            <input type="text" name="author" class="form-control" value="{{$truyen->author}}" id="exampleInputName1" placeholder="Tên tác giả">
        </div>
          <div class="form-group">
            <label for="exampleTextarea1">Tóm tắt</label>
            <textarea name="summary" class="form-control" id="exampleTextarea1" rows="3">{{$truyen->summary}}</textarea>
          </div>
          <div class="form-group">
            <label>File upload</label>
            <input type="file" name="url_img" class="file-upload-default">
            <div class="input-group col-xs-12">
              <input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Image">
              <span class="input-group-append">
                <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
              </span>
            </div>
          </div>
          <div class="form-group">
            <label for="exampleSelectGender">Thể loại</label>
              <select name="slug_genre" class="form-control" id="exampleSelectGender">
                @foreach ($genre as $item)
                    <option value="{{$item->slug}}"
                        @if ($item->slug == $truyen->slug_genre)
                            selected
                        @endif
                        >{{$item->name}}</option>
                @endforeach

              </select>
            </div>
            <div class="form-group">
                <label for="exampleSelectGender">Trạng thái</label>
                  <select name="status" class="form-control" id="exampleSelectGender">
                    <option value="0"
                        @if ($truyen->status == 0 )
                            selected
                        @endif>
                        Đang ra
                    </option>
                    <option value="1" @if ($truyen->status == 1)
                        selected
                    @endif>Hoàn thành</option>
                  </select>
                </div>

          <div class="form-group">
            <label for="exampleInputName1">Nguồn</label>
            <input type="text" name="source" class="form-control"  value="{{$truyen->source}}" id="exampleInputName1" placeholder="Nguồn">
          </div>

          <button type="submit" class="btn btn-primary me-2">Submit</button>
          <button class="btn btn-light">Cancel</button>
        </form>
      </div>
    </div>
  </div>
@endsection

