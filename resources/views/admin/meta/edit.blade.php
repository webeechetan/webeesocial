@extends('admin.layouts.app')
@section('title', 'Meta')
@section('content')
<div class="row">
    <div class="col-xl">
      <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h5 class="mb-0">Edit Meta</h5>
        </div>  
        <div class="card-body">
          <form method="POST" action="{{ route('meta.update',$meta->id) }}">
            @csrf
            @method('PUT')
            <div class="mb-3">
              <label class="form-label" for="basic-icon-default-company">URL</label>
              <div class="input-group input-group-merge">
                <span id="basic-icon-default-company2" class="input-group-text"><i class="bx bx-buildings"></i></span>
                <input type="text" class="form-control" id="" name="url" value="">
              </div>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection