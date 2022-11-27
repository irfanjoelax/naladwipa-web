@extends('layouts.admin')

@section('extra-style')
    <link rel="stylesheet" href="{{ asset('vendor/ckeditor/ckeditor.css') }}">
@endsection

@section('content')
    <div class="container mb-4">
        <div class="row">
            <div class="col bg-white p-3 rounded-4 shadow-sm">
                <h4 class="display-6 fw-bold">
                    {{ Str::ucfirst($activeMenu) }} {{ $isEdit ? 'Update' : 'Create' }}
                </h4>

                <hr>

                <form action="{{ $urlForm }}" method="POST" class="mt-4 mb-3" enctype="multipart/form-data">
                    @csrf @if ($isEdit)
                        @method('PUT')
                    @endif
                    <div class="row mb-3">
                        <label for="title" class="col-sm-2 col-form-label">Title</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="title"
                                placeholder="Type title your program here" value="{{ $isEdit ? $program->title : '' }}"
                                required autofocus>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label for="image" class="col-sm-2 col-form-label">Image</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control" name="image" {{ $isEdit ? '' : 'required' }}>
                            @if ($isEdit)
                                <small class="form-text text-danger">
                                    Leave blank if you don't want to change the program image
                                </small>
                                <br>
                                <img src="{{ asset('storage/' . $program->image) }}" class="img-thumbnail mt-2"
                                    width="150">
                            @endif
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="nama" class="col-sm-2 col-form-label">Description</label>
                        <div class="col-sm-10">
                            <textarea class="form-control ckeditor" name="description">{{ $isEdit ? $program->description : '' }}</textarea>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-sm-6 offset-sm-2 d-flex gap-3">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa-regular fa-circle-check"></i>
                                <span class="ms-1">Save now</span>
                            </button>
                            <a href="{{ url('admin/program') }}" class="btn btn-warning">
                                <i class="fa-solid fa-arrow-left-long"></i>
                                <span class="ms-1">Back to list</span>
                            </a>
                            @if ($isEdit)
                                <button type="button" class="btn btn-danger text-white" data-bs-toggle="modal"
                                    data-bs-target="#deleteModal">
                                    <i class="fa-regular fa-trash-can"></i>
                                    <span class="ms-1">Delete</span>
                                </button>
                            @endif
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @if ($isEdit)
        <x-modal-delete url="{{ route('program.destroy', ['program' => $program->id]) }}"></x-modal-delete>
    @endif
@endsection

@section('extra-script')
    <script src="{{ asset('vendor/ckeditor/ckeditor.js') }}"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('.ckeditor'))
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection
