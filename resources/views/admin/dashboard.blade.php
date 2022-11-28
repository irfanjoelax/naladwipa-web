@extends('layouts.admin')

@section('content')
    <div class="container mb-4">
        <div class="row mt-4">
            <div class="col-md-4 col-12 mb-3">
                <div class="bg-primary p-3 rounded-4 text-white d-flex align-items-center justify-content-between">
                    <div class="m-0">
                        <h1 class="m-0 display-4 fw-semibold">{{ $total_program }}</h1>
                        <h6 class="m-0 fw-semibold">
                            Total Program
                        </h6>
                    </div>
                    <h1 class="m-0 display-4">
                        <i class="fa-solid fa-list-check"></i>
                    </h1>
                </div>
            </div>
            <div class="col-md-4 col-12 mb-3">
                <div class="bg-warning p-3 rounded-4 text-white d-flex align-items-center justify-content-between">
                    <div class="m-0">
                        <h1 class="m-0 display-4 fw-semibold">{{ $total_essay }}</h1>
                        <h6 class="m-0 fw-semibold">
                            Total Essay
                        </h6>
                    </div>
                    <h1 class="m-0 display-4">
                        <i class="fa-regular fa-newspaper"></i>
                    </h1>
                </div>
            </div>
            <div class="col-md-4 col-12 mb-3">
                <div class="bg-danger p-3 rounded-4 text-white d-flex align-items-center justify-content-between">
                    <div class="m-0">
                        <h1 class="m-0 display-4 fw-semibold">{{ $total_film }}</h1>
                        <h6 class="m-0 fw-semibold">
                            Total film
                        </h6>
                    </div>
                    <h1 class="m-0 display-4">
                        <i class="fa-solid fa-film"></i>
                    </h1>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-12">
                <div class="bg-white p-2 rounded-4 shadow-sm">
                    {!! $chart_essay->renderHtml() !!}
                </div>
            </div>
            <div class="col-md-6 col-12">
                <div class="bg-white p-2 rounded-4 shadow-sm">
                    {!! $chart_film->renderHtml() !!}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('extra-script')
    {!! $chart_essay->renderChartJsLibrary() !!}
    {!! $chart_essay->renderJs() !!}
    {!! $chart_film->renderJs() !!}
@endsection
