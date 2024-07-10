<?php

namespace App\Http\Controllers;

use App\Models\Podcast;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class PodcastEpisodeController extends Controller
{
    public function index(int $id): View
    {
        $podcast = Podcast::with('episodes')->findOrFail($id);

        abort_unless($podcast->isVisibleTo(Auth::user()), 404);

        return view('podcast-episodes.index', compact('podcast'));
    }

   /*  public function create(int $id): View
    {
        $podcast = Auth::user()->podcasts()->findOrFail($id);

        return view('podcast-episodes.create', ['podcast' => $podcast]);
    }

    public function store(Request $request, int $id): RedirectResponse
    {
        $podcast = Auth::user()->podcasts()->findOrFail($id);

        $validated = $request->validate([
            'title' => ['required', 'max:150'],
            'content_text' => ['required', 'max:500'],
            'download_url' => ['required', 'url'],
        ]);

        $episode = $podcast->episodes()->create($validated);

        return redirect()->route('episodes.show', $episode);
    } */
}
