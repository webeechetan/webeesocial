@extends('admin.layouts.app')
@section('title', 'News')
@section('content')
<div class="row">
    <div class="col-xl">
      <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h5 class="mb-0">Add News</h5>
          <small class="text-muted float-end">
            <a href="{{ route('news.index') }}"<button class="btn btn-primary btn-sm">All News</button></a>
          </small>
        </div>
        <div class="card-body">
            <form method="POST" action="{{route('news.store')}}" >
                @csrf
                <div class="mb-3">
                    <label class="form-label" for="basic-icon-default-fullname">Publish Date</label>
                    <div class="input-group input-group-merge">
                    <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-user"></i></span>
                    <input type="date" class="form-control" id="basic-icon-default-fullname" name="publish_date">
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="basic-icon-default-company">Title</label>
                    <div class="input-group input-group-merge">
                    <span id="basic-icon-default-company2" class="input-group-text"><i class="bx bx-buildings"></i></span>
                    <input type="text" id="input_title" name="title" class="form-control" placeholder="Title">
                    </div>
                    @error('heading')    
                        <div class="text-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label" for="basic-icon-default-company">Slug</label>
                    <div class="input-group input-group-merge">
                    <span id="basic-icon-default-company2" class="input-group-text"><i class="bx bx-buildings"></i></span>
                    <input type="text" id="slug" name="slug" class="form-control" placeholder="Slug">
                    </div>
                    @error('slug')    
                        <div class="text-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label" for="basic-icon-default-message">Short Description</label>
                    <input type="text" name="short_description" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label" for="basic-icon-default-message">Description</label>
                    <textarea id="editor" name="description" class="form-control" placeholder="News"></textarea>
                </div>
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