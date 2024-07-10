@extends('layouts.site')

@section('title', 'Episodes')

@section('body')
<div class="container mt-4">
    <div class="constrain-xl mx-auto">
        <h1 class="mb-4 fw-bold">Latest Episodes</h1>
        @foreach ($episodes as $episode)
        <div class="row mb-4">
            <div class="col-3">
                <div class="shadow-sm">
                    <a href="{{ route('podcasts.show', $episode->podcast->id) }}">
                        <img src="{{ $episode->podcast->imageUrl() }}" class="img-fluid">
                    </a>
                </div>
            </div>
            <div class="col-9 pt-3">
                <div class="mb-3">
                    <p class="text-uppercase fw-semibold text-body-tertiary text-sm mb-1">{{ $episode->published_at->format('j M Y')}}</p>
                    <h2 class="text-lg text-truncate m-0">
                        <a href="{{ route('episodes.show', $episode) }}" class="fw-bold text-decoration-none text-reset">
                            {{ $episode->title }}
                        </a>
                    </h2>
                    <p class="text-sm text-uppercase text-truncate">
                        <a href="{{ route('podcasts.show', $episode->podcast->id) }}" class="text-secondary fw-semibold text-decoration-none">
                            {{ $episode->podcast->title }}
                        </a>
                    </p>
                </div>
                {{-- <audio class="d-block w-100 mb-4" controls preload="metadata">
                    <source src="{{ $episode->download_url }}" type="audio/mpeg">
                </audio> --}}
                <div class="text-nowrap">
                    <a href="{{ route('episodes.show', $episode) }}" class="btn btn-sm btn-outline-secondary">Listen</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="text-center">
        {{ $episodes->links() }}
    </div>
</div>
@endsection
