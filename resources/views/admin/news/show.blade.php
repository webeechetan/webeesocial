@extends('admin.layouts.app')
@section('title', 'News')
@section('content')
<div class="row">
    <div class="col-xl">
      <div class="card mb-4">
        <h4 class="text-center mt-4 text-primary">{{ $news->heading }}</h4>
        <div class="card-body">
            {!! $news->description !!}
        </div>
      </div>
    </div>
  </div>
@endsection
