@extends('admin.layouts.app')
@section('title', 'Our Clients')
@section('content')
<div class="row">
    <div class="col-xl">
      <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h5 class="mb-0">Edit News</h5>
        </div>
     
        <div class="card-body">
            <form method="POST" action="{{route('news.update',$newses->id)}}" >
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label class="form-label" for="basic-icon-default-fullname">Publish Date</label>
                    <div class="input-group input-group-merge">
                    <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-user"></i></span>
                    <input type="" class="form-control" id="basic-icon-default-fullname" name="publish_date" value="{{$newses->publish_date}}">
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="basic-icon-default-company">Title</label>
                    <div class="input-group input-group-merge">
                    <span id="basic-icon-default-company2" class="input-group-text"><i class="bx bx-buildings"></i></span>
                    <input type="text" id="basic-icon-default-company" name="heading" class="form-control" value="{{$newses->title}}">
                    </div>
                    @error('heading')    
                        <div class="text-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label" for="basic-icon-default-company">Slug</label>
                    <div class="input-group input-group-merge">
                    <span id="basic-icon-default-company2" class="input-group-text"><i class="bx bx-buildings"></i></span>
                    <input type="text" id="slug" name="slug" class="form-control" value="{{$newses->slug}}">
                    </div>
                    @error('heading')    
                        <div class="text-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label" for="basic-icon-default-message">Short Description</label>
                    <input type="text" name="short_description" class="form-control" value="{{$newses->short_description}}">
                </div>
                <div class="mb-3">
                    <label class="form-label" for="basic-icon-default-message">Description</label>
                    @php
                        $data = str_replace( '&', '&amp;', $newses->description )
                    @endphp
                    <textarea id="editor" name="description" class="form-control" placeholder="News">{{ $data }}</textarea>
                </div>
                @error('description')    
                <div class="text-danger mt-2">{{ $message }}</div>
                @enderror
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
      </div>
    </div>
  </div>
@endsection
@section('scripts')
<script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
<script>
  var options = {
    filebrowserImageBrowseUrl: '/admin/filemanager',
  };

  CKEDITOR.replace('editor', options);
</script>
@endsection