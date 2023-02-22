@extends('layouts.web')

@section('title')
    Beranda
@endsection

@section('content')
    <!-- ======= Hero Slider Section ======= -->
    <section id="hero-slider" class="hero-slider">
        <div class="container-md" data-aos="fade-in">
            <div class="row">
                <div class="col-12">
                    <div class="swiper sliderFeaturedPosts">
                        <div class="swiper-wrapper">
                            @foreach ($banners as $banner)
                                <div class="swiper-slide">
                                    <span class="img-bg d-flex align-items-end"
                                        style="background-image: url({{ asset('storage/' . $banner->image) }});">
                                    </span>
                                </div>
                            @endforeach
                        </div>
                        <div class="custom-swiper-button-next">
                            <span class="bi-chevron-right"></span>
                        </div>
                        <div class="custom-swiper-button-prev">
                            <span class="bi-chevron-left"></span>
                        </div>

                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- End Hero Slider Section -->

    <!-- ======= Culture Category Section ======= -->
    <section class="category-section">
        <div class="container" data-aos="fade-up">

            <div class="section-header d-flex justify-content-between align-items-center mb-5">
                <h2>Essay Terbaru</h2>
            </div>


            <div class="row">
                <div class="col-md-8">
                    @foreach ($essay_terbaru as $essay)
                        <div class="mb-md-5 mb-4">
                            <h3>
                                <a href="{{ url('essay/' . $essay->slug) }}">
                                    {{ $essay->title }}
                                </a>
                            </h3>

                            <p class="text-justify">
                                {!! Str::words($essay->content, 25, '...') !!}
                            </p>

                            <a href="{{ url('essay/' . $essay->slug) }}" class="btn btn-detail">
                                Lihat Selengkapnya <i class="bi bi-arrow-right-short"></i>
                            </a>
                        </div>
                    @endforeach
                </div>

                <div class="col-md-4">
                    <h4>Essay Terpopuler</h4>
                    <hr>
                    @foreach ($essay_terpopuler as $essay)
                        <div class="post-entry-1 border-bottom">
                            <div class="post-meta">
                                <span>{{ $essay->created_at->diffForHumans() }}</span>
                            </div>
                            <h2 class="mb-2">
                                <a href="{{ url('essay/' . $essay->slug) }}">
                                    {{ $essay->title }}
                                </a>
                            </h2>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- End Culture Category Section -->
@endsection
