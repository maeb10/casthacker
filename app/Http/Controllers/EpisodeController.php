<?php

namespace App\Http\Controllers;

use App\Models\Episode;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class EpisodeController extends Controller
{
    public function index(): View
    {
        $episodes = Episode::with('podcast')->recent()->paginate(25);

        return view('episodes.index', compact('episodes'));
    }

    public function show(int $id): View
    {
        $episode = Episode::with('podcast')->findOrFail($id);

        abort_unless($episode->isVisibleTo(Auth::user()), 404);

        return view('episodes.show', compact('episode'));
    }

    /* public function edit(int $id): View
    {
        $episode = Episode::with('podcast')->findOrFail($id);

        abort_unless($episode->isEditableBy(Auth::user()), 404);

        return view('episodes.edit', [
            'episode' => $episode
        ]);
    }

    public function update(Request $request, int $id): RedirectResponse
    {
        $episode = Episode::with('podcast')->findOrFail($id);

        abort_unless($episode->isEditableBy(Auth::user()), 404);

        $validated = $request->validate([
            'title' => ['required', 'max:150'],
            'content_text' => ['required', 'max:500'],
            'download_url' => ['required', 'url'],
        ]);

        $episode->update($validated);

        return redirect()->route('episodes.show', $episode);
    } */
}
