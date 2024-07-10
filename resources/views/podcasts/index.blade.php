@extends('layouts.site')

@section('title', 'Home')

@section('body')
    <div class="mb-5 border-top border-bottom">
        <div class="container">
            <div class="py-9">
                <h1 class="text-4xl fw-bold">Podcasting for Programmers</h1>
                <p class="fs-2 fw-lighter">The best place to discover and publish podcasts about building software.</p>
            </div>
        </div>
    </div>

    <div class="container overflow-hidden">
        <div>
            <h1 class="fw-bold mb-3">Popular Shows</h1>
            <div class="row gy-5">
                @foreach ($podcasts as $podcast)
                <div class="col-6 col-md-3 col-lg-2">
                    <div class="hover-grow">
                        <a href="{{ route('podcasts.show', $podcast) }}" class="d-block shadow-sm mb-2">
                            <img src="{{ $podcast->imageUrl() }}" class="img-fluid">
                        </a>
                        <p class="text-truncate m-0">
                            <a href="{{ route('podcasts.show', $podcast) }}" class="text-sm fw-semibold text-reset text-decoration-none">
                                {{ $podcast->title }}
                            </a>
                        </p>
                        <p class="text-uppercase text-truncate m-0">
                            <a href="{{ $podcast->website }}" class="text-xs text-reset text-decoration-none fw-light" rel="noopener" target="_blank">
                                {{ $podcast->websiteHost() }}
                            </a>
                        </p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
