@extends('layouts.site')

@section('title', $episode->title)

@section('body')
    <div class="container mt-4">
        <div class="row">
            <div class="col-sm-3">
                <div class="d-block shadow-sm mb-3">
                    <a href="{{ route('podcasts.show', $episode->podcast) }}">
                        <img src="{{ $episode->podcast->imageUrl() }}" class="img-fluid">
                    </a>
                </div>
            </div>
            <div class="col-sm-9">
                <div class="mb-4">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <div>
                            <p class="text-uppercase fw-semibold text-body-tertiary text-sm">{{ $episode->published_at->format('j M Y')}}</p>
                            <h1 class="lh-1 mb-1 fw-bold">{{ $episode->title }}</h1>
                            <p class="text-sm text-uppercase text-truncate mb-0">
                                <a href="{{ route('podcasts.show', $episode->podcast) }}" class="text-secondary fw-semibold text-decoration-none">
                                    {{ $episode->podcast->title }}
                                </a>
                            </p>
                        </div>
                    </div>
                    <audio class="d-block w-100 mb-4" controls preload="metadata">
                        <source src="{{ $episode->download_url }}" type="audio/mpeg">
                    </audio>
                    <div>
                        {!! $episode->content_html !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
