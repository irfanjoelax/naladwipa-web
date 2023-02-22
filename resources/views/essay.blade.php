@extends('layouts.web')

@section('title')
    Esai
@endsection

@section('content')
    <section id="search-result" class="search-result">
        <div class="container">
            <div class="row">
                <div class="col-md-9 mx-auto">
                    <h3 class="category-title">Esai {{ env('APP_NAME') }}</h3>

                    @foreach ($essays as $essay)
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
                                <p>
                                    {!! Str::words($essay->content, 35, '...') !!}
                                </p>
                                <a href="{{ url('essay/' . $essay->slug) }}" class="btn btn-detail">
                                    Lihat Selengkapnya <i class="bi bi-arrow-right-short"></i>
                                </a>
                            </div>
                        </div>
                    @endforeach

                    <!-- Paging -->
                    <div class="text-center py-4">
                        {{ $essays->appends($request)->links() }}
                    </div>
                    <!-- End Paging -->
                </div>
            </div>
        </div>
    </section> <!-- End Search Result -->
@endsection
