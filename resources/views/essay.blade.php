@extends('layouts.web')

@section('title')
    Esai
@endsection

@section('content')
    <section id="search-result" class="search-result">
        <div class="container">
            <h3 class="category-title">Esai {{ env('APP_NAME') }}</h3>
            @foreach ($essays as $essay)
                <div class="row">
                    <div class="col-4">
                        @if ($essay->image != null)
                            <img src="{{ asset('storage/' . $essay->image) }}" class="img-fluid rounded-4">
                        @endif
                    </div>
                    <div class="col-8">
                        <div class="d-md-flex post-entry-2 small-img">
                            <div>
                                <div class="post-meta">
                                    <span>{{ $essay->created_at->diffForHumans() }}</span>
                                </div>
                                <h3>
                                    <a href="{{ url('essay/' . $essay->slug) }}">
                                        {{ $essay->title }}
                                    </a>
                                </h3>
                                <div class="d-none d-md-block d-lg-block">
                                    {!! Str::words($essay->content, 35, '...') !!}
                                </div>
                                <a href="{{ url('essay/' . $essay->slug) }}" class="btn btn-detail">
                                    Lihat Selengkapnya <i class="bi bi-arrow-right-short"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

            <!-- Paging -->
            <div class="text-center py-4">
                {{ $essays->appends($request)->links() }}
            </div>
            <!-- End Paging -->
        </div>
    </section> <!-- End Search Result -->
@endsection
