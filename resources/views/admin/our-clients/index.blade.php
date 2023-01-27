@extends('admin.layouts.app')
@section('title', 'Our Clients')

@section('content')
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">All Clients</h5>
        <a href="{{ route('our-clients.create') }}" class="btn btn-primary btn-sm">Add New</a>
    </div>
    <div class="row">
        @foreach ($clients as $client)
        <div class="col-xl-3 col-sm-3">
            <div class="card text-center">
                <div class="card-body">
                    <div class="mx-auto mb-4">
                        <a href="{{ $client->image }}" target="_blank"><img src="{{ $client->image }}" class="card-img"></a>
                    </div>
                </div>
                <div class="card-footer bg-transparent border-top">
                    <div class="contact-links d-flex font-size-20">
                        <div class="flex-fill">
                            <a href="{{ route('our-clients.edit', $client->id) }}" class="btn btn-primary btn-sm"><i class="bx bx-edit"></i></a>
                        </div>
                        <div class="flex-fill">
                            <form action="{{ route('our-clients.destroy', $client->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"><i class="bx bx-trash-alt "></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
@endsection
