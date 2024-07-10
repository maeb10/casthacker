@extends('layouts.site')

@section('title', $podcast->title)

@section('body')
<div class="container mt-4">
    <h1 class="mb-4">Podcast Settings</h1>
    <div class="row border-bottom pb-4 mb-4">
        <div class="col-sm-4">
            <h2 class="text-lg mb-2 fw-bold">Podcast Details</h2>
            <p class="text-secondary">Update your podcast title, description, and website URL.</p>
        </div>
        <div class="col-sm-8">
            <form action="{{ route('podcasts.update', $podcast) }}" method="POST">
                @method('PATCH')
                @csrf
                <div class="mb-4">
                    <label for="title" class="form-label fw-semibold">Title</label>
                    <input id="title" name="title" type="text" class="form-control @error('title') is-invalid @enderror" placeholder="The World's Best Podcast" value="{{ old('title', $podcast) }}">
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="description" class="form-label fw-semibold">Description</label>
                    <textarea id="description" name="description" class="form-control @error('description') is-invalid @enderror" rows="3" placeholder="The best podcast for getting the best information about the best stuff.">{{ old('description', $podcast) }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="website" class="form-label fw-semibold">Website URL</label>
                    <input id="website" name="website" type="url" class="form-control @error('website') is-invalid @enderror" placeholder="http://example.com" value="{{ old('website', $podcast) }}">
                    @error('website')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="text-end">
                    <button class="btn btn-primary btn-sm">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <h2 class="text-lg mb-2 fw-bold">Cover Image</h2>
            <p class="text-secondary">Add a new cover image to your podcast.</p>
        </div>
        <div class="col-sm-8">
            <div id="cover-image-upload" data-podcast="{{ $podcast }}"></div>
            @error('cover_image')
                <div>
                    <div class="is-invalid"></div>
                    <div class="invalid-feedback">{{ $message }}</div>
                </div>
            @enderror
        </div>
    </div>
</div>
@endsection
