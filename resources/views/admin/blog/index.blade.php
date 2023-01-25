@extends('admin.layouts.app')
@section('title', 'Blog')

@section('styles')
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
@endsection

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Blog List</h5>
        <a href="{{route('blog.create')}}" class="btn btn-primary btn-sm">Add Blog</a>
    </div>
    <div class="table-responsive text-nowrap">
        <div class="container">
            <table class="table table-hover" id="datatable-blog">
                <thead>
                    <tr>
                        <th>Publish Date</th>
                        <th>Title</th>
                        <th>Slug</th>
                        <th>Short Description</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach($blogs as $blog)
                    <tr>
                        <td>{{$blog->publish_date}}</td>
                        <td>{{$blog->title}}</td>
                        <td>{{$blog->slug}}</td>
                        <td>{{$blog->short_description}}</td>
                        <td>{!!$blog->description!!}</td>
                        <td>
                        <a href="{{route('blog.edit', $blog->id)}}" class="btn btn-primary btn-sm">Edit</a>
                            <form action="{{route('blog.destroy',$blog->id)}}" method="POST" class="d-inline">
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
            $('#datatable-blog').DataTable();
        } );
    </script>
@endsection