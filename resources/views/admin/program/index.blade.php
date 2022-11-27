@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col bg-white p-3 rounded-4 shadow-sm">
                <div class="mt-2 mb-3 d-flex align-items-center justify-content-between">
                    <a href="{{ url('admin/program/create') }}" class="btn btn-sm btn-primary rounded">
                        <i class="fa-solid fa-plus"></i>
                        <span class="ms-1">
                            Create New
                        </span>
                    </a>


                    <form action="{{ url('admin/program') }}" method="GET">
                        <div class="input-group">
                            <input type="search" name="keyword" class="form-control"
                                value="{{ $request['keyword'] ?? '' }}" placeholder="Search...">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </form>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered align-middle">
                        <thead>
                            <tr>
                                <th class="text-center" width="10%">#</th>
                                <th class="text-center" width="20%">Image</th>
                                <th class="text-start" width="65%">Title</th>
                                <th class="text-center" width="5%"><i class="fa-solid fa-bolt"></i></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($programs as $program)
                                <tr>
                                    <td class="text-center">
                                        {{ ($programs->currentPage() - 1) * $programs->perPage() + $loop->iteration }}
                                    </td>
                                    <td class="text-center">
                                        <img src="{{ asset('storage/' . $program->image) }}" width="100"
                                            class="rounded-3">
                                    </td>
                                    <td class="text-start">
                                        {{ $program->title }}
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('program.edit', ['program' => $program->id]) }}"
                                            class="btn btn-sm btn-success rounded">
                                            <i class="fa-regular fa-pen-to-square"></i>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="text-danger text-center py-2" colspan="4">
                                        Data not found or has empty
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="mt-2">
                    {{ $programs->appends($request)->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
