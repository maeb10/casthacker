<?php

namespace App\Http\Controllers;

use App\Models\Podcast;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PublishedPodcastController extends Controller
{
    public function store(Request $request): Podcast
    {
        abort_unless(Auth::check(), 404);

        $podcast = Auth::user()->podcasts()->findOrFail(request('podcast_id'));

        $podcast->publish();

        return $podcast;
    }

    public function destroy(int $id): Podcast
    {
        abort_unless(Auth::check(), 404);

        $podcast = Auth::user()->podcasts()->findOrFail($id);

        $podcast->unpublish();

        return $podcast;
    }
}
