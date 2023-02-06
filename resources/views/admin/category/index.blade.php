@extends('admin.layouts.app')
@section('title', 'News')

@section('styles')
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
@endsection

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Category List</h5>
        <a href="{{ route('category.create')}}" class="btn btn-primary btn-sm">Add Category</a>
    </div>
    <div class="table-responsive text-nowrap">
        <div class="container">
            <table class="table" id="datatable-category">
                <thead>
                    <tr>
                        <th>Category Name</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach($categoryies as $category)
                    <tr>
                        <td>{{$category->name}}</td>
                        <td>
                        <a href="{{ route('category.edit',$category->id) }}" class="btn btn-primary btn-sm"><i class="bx bx-edit"></i></a>
                           <form action="{{ route('category.destroy' , $category->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"><i class="bx bx-trash-alt "></i></button>
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
            $('#datatable-category').DataTable();
        } );
    </script>
@endsection