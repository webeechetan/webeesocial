@extends('admin.layouts.app')
@section('title', 'Our Clients')

@section('styles')
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
@endsection

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">All Clients</h5>
        <a href="{{ route('our-clients.create') }}" class="btn btn-primary btn-sm">Add New</a>
    </div>
    <div class="table-responsive text-nowrap">
        <div class="container">
            <table class="table table-hover" id="datatable">
                <thead>
                    <tr>
                        <th>Logo</th>
                        <th>Alt Text</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($clients as $client)
                        <tr>
                            <td>
                                <img src="{{ $client->image }}" alt="{{ $client->image_alt }}" width="100" class="rounded-circle">
                            </td>
                            <td>{{ $client->image_alt ?? 'NAN' }}</td>
                            <td>
                                <a href="{{ route('our-clients.edit', $client->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                <form action="{{ route('our-clients.destroy', $client->id) }}" method="POST" class="d-inline">
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
            $('#datatable').DataTable();
        } );
    </script>
@endsection