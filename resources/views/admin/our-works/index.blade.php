@extends('admin.layouts.app')
@section('title', 'Our-Works')

@section('styles')
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
@endsection

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Our Works</h5>
        <a href="{{ route('our-work.create')}}" class="btn btn-primary btn-sm">Add Work</a>
    </div>
    <div class="table-responsive text-nowrap">
        <div class="container">
            <table class="table table-hover" id="datatable-news">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Slug</th>
                        <th>Short Description</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach($works as $work)
                    <tr>
                        <td>{{$work->title}}</td>
                        <td>
                            {{$work->slug}}
                        </td>
                        <td>{{$work->short_description}}</td>

                        <td>
                            <a href="">{!! \Illuminate\Support\Str::words($work->description,5,'Read More..') !!} </a>
                        </td>
                        
                        <td>
                        <a href="{{route('our-work.edit', $work->id)}}" class="btn btn-primary btn-sm">Edit</a>
                        <form action="{{route('our-work.destroy',$work->id)}}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready( function () {
            $('#datatable-news').DataTable();
        } );
    </script>
@endsection