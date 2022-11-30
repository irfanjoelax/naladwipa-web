@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col bg-white p-3 rounded-4 shadow-sm">
                <h4 class="display-6 fw-bold">
                    {{ Str::ucfirst($activeMenu) }} {{ $isEdit ? 'Update' : 'Create' }}
                </h4>

                <hr>

                <form action="{{ $url }}" method="POST" class="mt-4 mb-3" enctype="multipart/form-data">
                    @csrf @if ($isEdit)
                        @method('PUT')
                    @endif

                    <div class="row mb-4">
                        <label for="image" class="col-sm-2 col-form-label">Image Banner</label>
                        <div class="col-sm-10">
                            @if ($isEdit)
                                <img src="{{ asset('storage/' . $banner->image) }}"
                                    alt="{{ asset('storage/' . $banner->image) }}" class="img-thumbnail mb-2"
                                    width="350">
                            @endif
                            <input type="file" class="form-control" name="image" required>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-sm-6 offset-sm-2 d-flex gap-3">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa-regular fa-circle-check"></i>
                                <span class="ms-1">Save now</span>
                            </button>
                            <a href="{{ url('admin/banner') }}" class="btn btn-warning">
                                <i class="fa-solid fa-arrow-left-long"></i>
                                <span class="ms-1">Back to list</span>
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
