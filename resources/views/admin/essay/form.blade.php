@extends('layouts.admin')

@section('extra-style')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
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
                        <label for="image">Title</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" name="title"
                                placeholder="Type title your essay here" value="{{ $isEdit ? $essay->title : '' }}" required
                                autofocus>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-12">
                            <label for="image">Image</label>
                            <input type="file" class="form-control" name="image" {{ $isEdit ? '' : 'required' }}>
                            @if ($isEdit)
                                <small class="form-text text-danger">
                                    Leave blank if you don't want to change the essay image
                                </small>
                                <br>
                                <img src="{{ asset('storage/' . $essay->image) }}" class="img-thumbnail mt-2"
                                    width="150">
                            @endif
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-12">
                            <textarea class="form-control summernote" name="content">{{ $isEdit ? $essay->content : '' }}</textarea>
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
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.summernote').summernote();
        });
    </script>
@endsection
