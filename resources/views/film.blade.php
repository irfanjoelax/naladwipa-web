@extends('layouts.web')

@section('title')
    Film
@endsection

@section('content')
    <section id="search-result" class="search-result">
        <div class="container">
            <div class="row">
                <div class="col-md-9 mx-auto">
                    <h3 class="category-title">Film {{ env('APP_NAME') }}</h3>

                    @foreach ($films as $film)
                        <div class="d-md-flex post-entry-2 small-img">
                            <a href="{{ $film->url }}" class="me-4 thumbnail">
                                <iframe class="img-fluid rounded-3" id="ytplayer" type="text/html" src="{{ $film->url }}"
                                    frameborder="0" allowfullscreen></iframe>
                            </a>
                            <div>
                                <div class="post-meta">
                                    <span>{{ Str::substr($film->created_at, 0, 10) }}</span>
                                </div>
                                <h3>
                                    <a href="{{ url('film/' . $film->slug) }}">
                                        {{ $film->title }}
                                    </a>
                                </h3>
                                <a href="{{ $film->url }}" class="btn btn-detail glightbox link-video">
                                    Lihat Besar <i class="bi bi-arrow-right-short"></i>
                                </a>
                            </div>
                        </div>
                    @endforeach

                    <!-- Paging -->
                    <div class="text-center py-4">
                        {{ $films->appends($request)->links() }}
                    </div>
                    <!-- End Paging -->
                </div>
            </div>
        </div>
    </section>
    <!-- End Search Result -->
@endsection
