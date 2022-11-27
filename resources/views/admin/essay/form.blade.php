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
                        <div class="col-sm-12">
                            <input type="text" class="form-control" name="title"
                                placeholder="Type title your essay here" value="{{ $isEdit ? $essay->title : '' }}" required
                                autofocus>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-12">
                            <textarea class="form-control ckeditor" name="content">{{ $isEdit ? $essay->content : '' }}</textarea>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-sm-12 d-flex gap-3">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa-regular fa-circle-check"></i>
                                <span class="ms-1">Save now</span>
                            </button>
                            <a href="{{ url('admin/essay') }}" class="btn btn-warning">
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
        <x-modal-delete url="{{ route('essay.destroy', ['essay' => $essay->id]) }}"></x-modal-delete>
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
