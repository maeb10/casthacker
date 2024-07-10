<?php

namespace App\Http\Controllers;

use App\Models\Podcast;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class PodcastController extends Controller
{
    public function index(): View
    {
        $podcasts = Podcast::published()->simplePaginate(24);

        return view('podcasts.index', compact('podcasts'));
    }

    /* public function create(): View
    {
        return view('podcasts.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'max:150'],
            'description' => ['required', 'max:500'],
            'website' => ['required', 'url'],
        ]);

        $podcast = Auth::user()->podcasts()->create($validated);

        return redirect()->route('podcasts.show', $podcast);
    } */

    public function show(Podcast $podcast): View
    {
        abort_unless($podcast->isVisibleTo(Auth::user()), 404);

        return view('podcasts.show', [
            'podcast' => $podcast,
            'episodes' => $podcast->recentEpisodes(5),
        ]);
    }

    public function edit(int $id): View
    {
        abort_unless(Auth::check(), 404);

        $podcast = Auth::user()->podcasts()->findOrFail($id);

        return view('podcasts.edit', compact('podcast'));
    }


    public function update(Request $request, int $id): RedirectResponse
    {
        abort_unless(Auth::check(), 404);

        $podcast = Auth::user()->podcasts()->findOrFail($id);

        $validated = $request->validate([
            'title' => ['required', 'max:150'],
            'description' => ['required', 'max:500'],
            'website' => ['required', 'url'],
        ]);

        $podcast->update($validated);

        return redirect()->route('podcasts.show', $podcast);
    }

    /* public function destroy(int $id): RedirectResponse
    {
        $podcast = Auth::user()->podcasts()->findOrFail($id);

        $podcast->delete();

        return redirect()->route('podcasts.index');
    } */
}
