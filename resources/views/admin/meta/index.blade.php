@extends('admin.layouts.app')
@section('title', 'Meta Details')

@section('styles')
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
@endsection

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Meta Details</h5>
    </div>
    <div class="table-responsive text-nowrap">
        <table class="table table-hover" id="datatable">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Url</th>
                    <th>Meta Title</th>
                    <th>Meta Description</th>
                    <th>Og Title</th>
                    <th>Og Image</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach ($metas as $meta)
                    <tr>
                       <td>{{ $meta->id }}</td>
                       <td>{{ $meta->url }}</td>
                       <td>{{ \Illuminate\Support\Str::words($meta->meta_title,5,'.....') }}</td>
                       <td>{{ \Illuminate\Support\Str::words($meta->meta_description,5,'.....') }}</td>
                       <td>{{ $meta->og_title }}</td>
                       <td>{{ $meta->og_image }}</td>
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
            $('#datatable').DataTable();
        } );
    </script>
@endsection