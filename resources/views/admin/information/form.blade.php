@extends('layouts.admin')

@section('content')
    <div class="container mb-4">
        <div class="row">
            <div class="col bg-white p-3 rounded-4 shadow-sm">
                <h4 class="display-6 fw-bold">
                    {{ Str::ucfirst($activeMenu) }} Update
                </h4>

                <hr>

                <form action="{{ route('information.store') }}" method="POST" class="mt-4 mb-3" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="email" value="{{ $information->email }}"
                                required autofocus>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="address" class="col-sm-2 col-form-label">Address</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" name="address" rows="3">{{ $information->address }}</textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="facebook" class="col-sm-2 col-form-label">Facebook</label>
                        <div class="col-sm-10">
                            <input type="url" class="form-control" name="facebook" value="{{ $information->facebook }}"
                                required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="twitter" class="col-sm-2 col-form-label">Twitter</label>
                        <div class="col-sm-10">
                            <input type="url" class="form-control" name="twitter" value="{{ $information->twitter }}"
                                required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="youtube" class="col-sm-2 col-form-label">Youtube</label>
                        <div class="col-sm-10">
                            <input type="url" class="form-control" name="youtube" value="{{ $information->youtube }}"
                                required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="instagram" class="col-sm-2 col-form-label">Instagram</label>
                        <div class="col-sm-10">
                            <input type="url" class="form-control" name="instagram"
                                value="{{ $information->instagram }}" required>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-sm-6 offset-sm-2 d-flex gap-3">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa-regular fa-circle-check"></i>
                                <span class="ms-1">Save now</span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
