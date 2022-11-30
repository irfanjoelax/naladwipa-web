@extends('layouts.web')

@section('title')
    Tentang Kami
@endsection

@section('content')
    <section>
        <div class="container" data-aos="fade-up">
            <div class="row">
                <div class="col-lg-12 text-center mb-5">
                    <h1 class="page-title">Tentang Kami</h1>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 col-12 mb-md-5 mb-2">
                    <a href="#" class="me-4 thumbnail">
                        <img src="{{ asset('img/about.svg') }}" alt="" class="img-fluid">
                    </a>
                </div>
                <div class="col-md-6 col-12 mb-md-5 mb-2 align-self-center">
                    <div class="ps-md-5 mt-4 mt-md-0">
                        <div class="post-meta mt-4">Tentang</div>
                        <h2 class="mb-4 display-4">{{ env('APP_NAME') }}</h2>

                        <div>
                            {!! $information->about !!}
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 col-12 mb-md-5 mb-2 align-self-center">
                    <div class="pe-md-5 mt-4 mt-md-0">
                        <div class="post-meta mt-4">Misi &amp; Visi</div>
                        <h2 class="mb-4 display-4">Misi &amp; Visi</h2>

                        <div>
                            {!! $information->visi !!}
                        </div>

                        <div>
                            {!! $information->misi !!}
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-12 mb-md-5 mb-2">
                    <a href="#" class="me-4 thumbnail">
                        <img src="{{ asset('img/visi-misi.svg') }}" alt="" class="img-fluid">
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection
