@extends('admin.layouts.app')
@section('title', 'Blog')

@section('styles')
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
@endsection

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Blog List</h5>
        <a href="" class="btn btn-primary btn-sm">Add Blog</a>
    </div>
    <div class="table-responsive text-nowrap">
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
                
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>

            </tbody>
        </table>
    </div>
</div>

@section('scripts')
    <script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready( function () {
            $('#datatable-blog').DataTable();
        } );
    </script>
@endsection