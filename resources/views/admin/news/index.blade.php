@extends('admin.layouts.app')
@section('title', 'News')

@section('styles')
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
@endsection


@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">News's</h5>
        <a href="{{ route('news.create')}}" class="btn btn-primary btn-sm">Add News</a>
    </div>
    <div class="table-responsive text-nowrap">
        <table class="table table-hover" id="datatable-news">
            <thead>
                <tr>
                    <th>Publish Date</th>
                    <th>Heading</th>
                    <th>News</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach($news as $new)
                <tr>
                    <td>{{$new->publish_date}}</td>
                    <td>{{$new->heading}}</td>
                    <td>{{$new->news}}</td>
                    <td>
                       <a href="{{route('news.edit', $new->id)}}" class="btn btn-primary btn-sm">Edit</a>
                       <form action="{{route('news.destroy',$new->id)}}" method="POST" class="d-inline">
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
@endsection

@section('scripts')
    <script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready( function () {
            $('#datatable-news').DataTable();
        } );
    </script>
@endsection