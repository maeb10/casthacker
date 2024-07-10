<?php

namespace App\Http\Controllers;

use App\Models\Podcast;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class SubscriptionController extends Controller
{
    public function store(Request $request): Subscription
    {
        abort_unless(Auth::check(), 404);

        $podcast = Podcast::published()->findOrFail(request('podcast_id'));

        $subscription = Subscription::create([
            'user_id' => Auth::user()->id,
            'podcast_id' => $podcast->id,
        ]);

        return $subscription;
    }

    public function destroy(int $id): Response
    {
        abort_unless(Auth::check(), 404);

        $subscription = Auth::user()->subscriptions()->findOrFail($id);

        $subscription->delete();

        return response('', 204);
    }
}
