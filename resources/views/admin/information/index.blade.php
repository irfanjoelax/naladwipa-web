@extends('layouts.admin')

@section('content')
    <div class="container mb-4">
        <div class="row">
            <div class="col-12">
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link rounded-pill active" id="pills-about-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-about" type="button" role="tab" aria-controls="pills-about"
                            aria-selected="false">About</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link rounded-pill" id="pills-visi-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-visi" type="button" role="tab" aria-controls="pills-visi"
                            aria-selected="false">Visi</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link rounded-pill" id="pills-misi-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-misi" type="button" role="tab" aria-controls="pills-misi"
                            aria-selected="false">Misi</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link rounded-pill" id="pills-sosial-media-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-sosial-media" type="button" role="tab"
                            aria-controls="pills-sosial-media" aria-selected="true">
                            Sosial Media
                        </button>
                    </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-about" role="tabpanel"
                        aria-labelledby="pills-about-tab" tabindex="0">
                        @include('admin.information.about')
                    </div>
                    <div class="tab-pane fade" id="pills-visi" role="tabpanel" aria-labelledby="pills-visi-tab"
                        tabindex="0">
                        @include('admin.information.visi')
                    </div>
                    <div class="tab-pane fade" id="pills-misi" role="tabpanel" aria-labelledby="pills-misi-tab"
                        tabindex="0">
                        @include('admin.information.misi')
                    </div>
                    <div class="tab-pane fade " id="pills-sosial-media" role="tabpanel"
                        aria-labelledby="pills-sosial-media-tab" tabindex="0">
                        @include('admin.information.sosmed')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
