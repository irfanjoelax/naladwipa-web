@extends('layouts.web')

@section('title')
    Esai {{ $essay->title }}
@endsection

@section('content')
    <section class="single-post-content">
        <div class="container">
            <div class="row">
                <div class="col-md-9 post-content" data-aos="fade-up">
                    <!-- ======= Single Post Content ======= -->
                    <div class="single-post">
                        <div class="post-meta">
                            <span>{{ $essay->created_at->diffForHumans() }}</span>
                        </div>
                        <h1 class="mb-5">
                            {{ $essay->title }}
                        </h1>
                        <div class="">
                            <!-- AddToAny BEGIN -->
                            <div class="a2a_kit a2a_kit_size_32 a2a_default_style">
                                <a class="a2a_dd" href="https://www.addtoany.com/share"></a>
                                <a class="a2a_button_facebook"></a>
                                <a class="a2a_button_twitter"></a>
                                <a class="a2a_button_email"></a>
                                <a class="a2a_button_whatsapp"></a>
                                <a class="a2a_button_facebook_messenger"></a>
                                <a class="a2a_button_telegram"></a>
                                <a class="a2a_button_google_gmail"></a>
                                <a class="a2a_button_line"></a>
                            </div>

                            <!-- AddToAny END -->
                        </div>
                        <div class="mt-4">
                            {!! $essay->content !!}
                        </div>
                    </div>
                    <!-- End Single Post Content -->

                </div>
                <div class="col-md-3">
                    <!-- ======= Sidebar ======= -->
                    <div class="aside-block">
                        <ul class="nav nav-pills custom-tab-nav mb-4" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="pills-popular-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-popular" type="button" role="tab"
                                    aria-controls="pills-popular" aria-selected="true">Esai Terbaru</button>
                            </li>
                        </ul>

                        <div class="tab-content" id="pills-tabContent">
                            <!-- Popular -->
                            <div class="tab-pane fade show active" id="pills-popular" role="tabpanel"
                                aria-labelledby="pills-popular-tab">
                                @foreach ($essay_latest as $essay)
                                    <div class="post-entry-1 border-bottom">
                                        <div class="post-meta">
                                            <span>{{ Str::substr($essay->created_at, 0, 10) }}</span>
                                        </div>
                                        <h2 class="mb-2">
                                            <a href="{{ url('essay/' . $essay->slug) }}">
                                                {{ $essay->title }}
                                            </a>
                                        </h2>
                                    </div>
                                @endforeach
                            </div>
                            <!-- End Popular -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('extra-script')
    <script async src="https://static.addtoany.com/menu/page.js"></script>
@endsection
