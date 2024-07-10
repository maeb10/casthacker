<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class PodcastCoverImageController extends Controller
{
    public function update(Request $request, int $id): RedirectResponse
    {
        abort_unless(Auth::check(), 404);

        $podcast = Auth::user()->podcasts()->findOrFail($id);

        $request->validate([
            'cover_image' => ['required', 'image', Rule::dimensions()->minHeight(500), Rule::dimensions()->minWidth(500)],
        ]);


        $oldFilename = $podcast->cover_path;
        if (Storage::disk('public')->exists($oldFilename)) {
            Storage::disk('public')->delete($oldFilename);
        }

        $file = $request->file('cover_image');
        $filename = date('d-m-Y', time()).'-'.$file->getClientOriginalName();

        $podcast->update([
            'cover_path' => $file->storeAs('images/podcast-art', $filename, 'public'),
        ]);

        return redirect()->route('podcasts.show', $podcast);
    }
}
