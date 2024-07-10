@extends('layouts.site')

@section('title', $podcast->title)

@section('body')
    <div class="container mt-4">
        <div class="row">
            <div class="col-12 col-md-3">
                <div class="d-block shadow-sm mb-3">
                    <a href="{{ route('podcasts.show', $podcast) }}">
                        <img src="{{ $podcast->imageUrl() }}" class="img-fluid">
                    </a>
                </div>
            </div>
            <div class="col-12 col-md-9">
                <div class="mb-4">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div>
                            <h1>
                                <a href="{{ route('podcasts.show', $podcast) }}" class="fw-bold text-decoration-none text-reset">{{ $podcast->title }}</a>
                            </h1>
                            <p class="text-sm text-uppercase text-truncate">
                                <a href="{{ $podcast->website }}" class="text-decoration-none fw-semibold text-secondary">
                                    {{ $podcast->websiteHost() }}
                                </a>
                            </p>
                        </div>
                        <div class="">
                            @if ($podcast->isOwnedBy(Auth::user()))
                                <div
                                    id="publish-button"
                                    data-podcast="{{ $podcast }}"
                                    class="d-inline-block me-2"
                                ></div>
                                <a href="{{ route('podcasts.edit', $podcast) }}" class="btn btn-sm btn-outline-secondary">
                                    Settings
                                </a>
                            @endif
                        </div>
                    </div>
                    <div class="mb-3">
                        @auth
                            <div
                                id="subscribe-button"
                                data-subscription="{{ json_encode(Auth::user()->subscriptionTo($podcast)) }}"
                                data-podcast="{{ $podcast }}"
                            ></div>
                        @endauth
                    </div>
                    <p class="text-secondary">{{ $podcast->description }}</p>
                </div>
                @if (count($episodes) > 0)
                    <div>
                        <div class="d-flex align-items-baseline mb-3">
                            <h2 class="text-lg mb-0 me-3">Recent Episodes</h2>
                            <a href="{{ route('podcasts.episodes.index', $podcast) }}" class="text-decoration-none">View all</a>
                        </div>
                        <div class="text-sm">
                        @foreach ($podcast->episodes->sortByDesc('number')->take(5) as $episode)
                            <div class="border-top d-sm-flex align-items-baseline">
                                <div style="flex: 0 0 3rem;" class="text-nowrap pe-3 text-end text-secondary py-3">{{ $episode->number }}</div>
                                <div class="text-truncate flex-fill mw-100">
                                    <a class="text-decoration-none text-reset" href="{{ route('episodes.show', $episode) }}">{{ $episode->title }}</a>
                                </div>
                                <div style="flex: 0 0 6rem;" class="text-nowrap text-secondary pe-3 text-end">
                                    {{ $episode->durationForHumans() }}
                                </div>
                                <div style="flex: 0 0 6.5rem;" class="text-nowrap text-secondary pe-3">
                                    {{ $episode->published_at->format('M j, Y') }}
                                </div>
                                <div style="flex: 0 0 4.5rem;" class="text-no-wrap text-end pb-3 pb-sm-0">
                                    <a href="{{ route('episodes.show', $episode) }}" class="btn btn-sm btn-outline-secondary">Listen</a>
                                </div>
                            </div>
                        @endforeach
                        </div>
                    </div>
                @else
                    <div class="text-center py-5 text-lg text-secondary">
                        This podcast hasn't published any episodes yet.
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
