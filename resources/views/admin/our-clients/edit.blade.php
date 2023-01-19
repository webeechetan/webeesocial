@extends('admin.layouts.app')
@section('title', 'Our Clients')
@section('content')
<div class="row">
    <div class="col-xl">
      <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h5 class="mb-0">Update Client</h5>
        </div>  
        <div class="card-body">
          <form method="POST" action="{{ route('our-clients.update',$ourClient->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
              <label class="form-label" for="basic-icon-default-company">Logo</label>
              <div class="input-group">
                <span class="input-group-btn">
                  <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                    <i class="menu-icon tf-icons bx bx-file"></i>Choose
                  </a>
                </span>
                <input id="thumbnail" class="form-control" type="text" name="image" value="{{ $ourClient->image }}">
              </div>
              <img src="{{ $ourClient->image }}" alt="" width="100">
              @error('image')    
                  <div class="text-danger mt-2">{{ $message }}</div>
              @enderror
            </div>

            <div class="mb-3">
              <label class="form-label" for="basic-icon-default-company">Logo Alt Text</label>
              <div class="input-group input-group-merge">
                <span id="basic-icon-default-company2" class="input-group-text"><i class="bx bx-buildings"></i></span>
                <input type="text" class="form-control" id="image_alt" name="image_alt" placeholder="ACME Inc." value="{{ $ourClient->image_alt }}">
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
<script>
  $(document).ready(function() {
      $('#thumbnail').change(function(e) {
          $("#image_alt").val(e.value);
      });
  });
  $('#lfm').filemanager('file');
</script>
@endsection