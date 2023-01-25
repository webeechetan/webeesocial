@extends('admin.layouts.app')
@section('title', 'Our Work')

@section('styles')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('content')
<div class="row">
    <div class="col-xl">
      <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h5 class="mb-0">Edit Work</h5>
          <small class="text-muted float-end">
            <a href="{{ route('our-work.index') }}"> <button class="btn btn-primary btn-sm">Our Work List</button> </a>
          </small>
        </div>
        <div class="card-body">
            <form method="POST" action="{{route('our-work.update',$ourWork->id)}}" enctype="multipart/form-data" >
                @csrf
                @method('PUT')
                <div class="row">

                  <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label" for="basic-icon-default-company">Title <span class="text-danger"><b>*</b></span> </label>
                        <div class="input-group input-group-merge">
                          <span id="basic-icon-default-company2" class="input-group-text"><i class="bx bx-buildings"></i></span>
                          <input type="text" id="input_title" name="title" class="form-control" value="{{$ourWork->title}}">
                        </div>
                          @error('title')    
                              <div class="text-danger mt-2">{{ $message }}</div>
                          @enderror
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="mb-3">
                      <label class="form-label" for="basic-icon-default-company">Slug</label>
                      <div class="input-group input-group-merge">
                      <span id="basic-icon-default-company2" class="input-group-text"><i class="bx bx-buildings"></i></span>
                      <input type="text" id="slug" name="slug" class="form-control" value="{{$ourWork->slug}}">
                      </div>
                      @error('slug')    
                          <div class="text-danger mt-2">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="mb-3">
                      <label class="form-label" for="basic-icon-default-message">Thumbnail</label>
                      <div class="input-group">
                        <span class="input-group-btn text-white">
                          <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                            <i class="menu-icon tf-icons bx bx-file"></i>Choose
                          </a>
                        </span>
                        <input id="thumbnail" class="form-control" type="text" name="thumbnail" value="{{$ourWork->title}}">
                      </div>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="mb-3">
                      <label class="form-label" for="basic-icon-default-fullname">Category</label>
                        <select class="form-control categories"  name="categories[]" multiple>
                          <option value="">--Select Category--</option>
                          @foreach($categories as $category)
                          <option value="{{ $category->id }}">{{ $category->name }}</option>
                          @endforeach
                        </select>
                    </div>
                  </div>
                  
                  <div class="col-md-12">
                    <div class="mb-3">
                      <label class="form-label" for="basic-icon-default-message">Description</label>
                      <textarea id="editor" name="description" class="form-control" >{{ $ourWork->description }}</textarea>
                      @error('description')    
                          <div class="text-danger mt-2">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>

                  <div class="col-md-12">
                    <div class="mb-3">
                      <label class="form-label" for="basic-icon-default-message">Short Description</label>
                      <textarea name="short_description" class="form-control">{{$ourWork->short_description}}</textarea>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="mb-3">
                      <label class="form-label" for="basic-icon-default-message">Meta Title</label>
                      <input type="text" name="meta_title" class="form-control" value="{{$ourWork->meta_title}}">
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="mb-3">
                      <label class="form-label" for="basic-icon-default-message">Meta Description</label>
                      <input type="text" name="meta_description" class="form-control" value="{{$ourWork->meta_description}}">
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="mb-3">
                      <label class="form-label" for="basic-icon-default-message">OG Title</label>
                      <input type="text" name="og_title" class="form-control" value="{{$ourWork->og_title}}">
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="mb-3">
                      <label class="form-label" for="basic-icon-default-message">Og Image</label>
                      <div class="input-group">
                        <span class="input-group-btn text-white">
                          <a id="og_image" data-input="og_image_input" data-preview="og_image_holder" class="btn btn-primary">
                            <i class="menu-icon tf-icons bx bx-file"></i>Choose
                          </a>
                        </span>
                        <input id="og_image_input" class="form-control" type="text" name="og_image" value="{{$ourWork->og_image}}">
                      </div>
                          <div id="og_image_holder" class="img-fluid" width="250px"></div>
                    </div>
                  </div>

              </div>
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
      </div>
    </div>
  </div>
@endsection


@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
<script>

$(document).ready(function (){

  $('#lfm').filemanager('file');
  $('#og_image').filemanager('file');
  $(".categories").select2()

});

  var options = {
    filebrowserImageBrowseUrl: '/admin/filemanager',
  };

  CKEDITOR.replace('editor', options);
</script>
@endsection