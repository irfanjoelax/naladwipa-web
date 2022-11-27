@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col bg-white p-3 rounded-4 shadow-sm">
                <div class="mt-2 mb-3 d-flex align-items-center justify-content-between">
                    <a href="{{ url('admin/film/create') }}" class="btn btn-sm btn-primary rounded">
                        <i class="fa-solid fa-plus"></i>
                        <span class="ms-1">
                            Create New
                        </span>
                    </a>


                    <form action="{{ url('admin/film') }}" method="GET">
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
                                <th class="text-start" width="45%">Title</th>
                                <th class="text-start" width="40%">URL Video</th>
                                <th class="text-center" width="5%"><i class="fa-solid fa-bolt"></i></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($films as $film)
                                <tr>
                                    <td class="text-center">
                                        {{ ($films->currentPage() - 1) * $films->perPage() + $loop->iteration }}
                                    </td>
                                    <td class="text-start">
                                        {{ $film->title }}
                                    </td>
                                    <td class="text-start">
                                        <a href="{{ $film->url }}" target="_blank">
                                            {{ $film->url }}
                                        </a>
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('film.edit', ['film' => $film->id]) }}"
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
                    {{ $films->appends($request)->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
