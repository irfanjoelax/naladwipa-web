@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-3">
                <h3 class="display-5 fw-bold">Banner Website</h3>

                <div class="mt-4 mb-3">
                    <a href="{{ url('admin/banner/create') }}" class="btn btn-sm btn-primary rounded">
                        <i class="fa-solid fa-plus"></i>
                        <span class="ms-1">
                            Create New
                        </span>
                    </a>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($banners as $item)
                <div class="col-md-4 col-sm-6 col-12 mb-3">
                    <div class="card rounded-4 shadow">
                        <div class="card-body">
                            <img src="{{ asset('storage/' . $item->image) }}" alt="{{ asset('storage/' . $item->image) }}"
                                class="img-fluid rounded-3">
                        </div>
                        <div class="card-footer d-flex gap-3">

                            <a href="{{ url('admin/banner/' . $item->id . '/edit') }}"
                                class="btn btn-sm text-white w-100 btn-warning">
                                <i class="fa-regular fa-pen-to-square"></i>
                                <span class="ms-1">
                                    Edit
                                </span>
                            </a>
                            <a class="btn btn-sm text-white w-100 btn-danger"
                                href="{{ url('/admin/banner/' . $item->id, []) }}"
                                onclick="event.preventDefault(); document.getElementById('delete-{{ $item->id }}').submit();">
                                <i class="fa-regular fa-trash-can"></i>
                                <span class="ms-1">
                                    Delete
                                </span>
                            </a>

                            <form id="delete-{{ $item->id }}" action="{{ url('/admin/banner/' . $item->id, []) }}"
                                method="POST" class="d-none">
                                @csrf @method('DELETE')
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
