<?php

namespace App\Models;

use App\Models\User;
use App\Models\Episode;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Podcast extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected function casts(): array
    {
        return [
            'published_at' => 'datetime',
        ];
    }

    public function scopePublished(Builder $query): void
    {
        $query->whereNotNull('published_at');
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'subscriptions')->withTimestamps();
    }

    /* public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    } */

    public function episodes(): HasMany
    {
        return $this->hasMany(Episode::class);
    }

    public function publish(): void
    {
        $this->update(['published_at' => $this->freshTimestamp()]);
    }

    public function unpublish(): void
    {
        $this->update(['published_at' => null]);
    }

    public function recentEpisodes(int $count = 5): Collection
    {
        return $this->episodes()->recent()->take($count)->get();
    }

    public function imageUrl(): string
    {
        return asset("storage/$this->cover_path");
    }

    public function websiteHost(): string
    {
        return parse_url($this->website, PHP_URL_HOST);
    }

    public function isVisibleTo(?User $user): bool
    {
        return $this->isPublished() || $this->isOwnedBy($user);
    }

    public function isPublished(): bool
    {
        return $this->published_at !== null;
    }

    public function isOwnedBy(?User $user): bool
    {
        return $this->user_id === $user?->getKey();
    }

    public function toArray()
    {
        return array_merge(parent::toArray(), [
            'cover_url' => $this->imageUrl(),
            'published' => $this->isPublished(),
            // 'subscribed' => auth()->user()?->subscribesTo($this),
            'links' => [
                'update_cover_image' => route('podcasts.cover-image.update', $this->id),
            ],
        ]);
    }
}
