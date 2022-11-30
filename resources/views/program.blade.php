@extends('layouts.web')

@section('title')
    Program {{ $program->title }}
@endsection

@section('content')
    <section>
        <div class="container" data-aos="fade-up">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div class="mb-5">
                        <h1 class="display-4 text-center">{{ $program->title }}</h1>
                    </div>
                    <img src="{{ asset('storage/' . $program->image) }}" width="100%" class="img-fluid rounded-4">
                    <div class="my-4">
                        {!! $program->description !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
