<?php

namespace App\Models;

use App\Models\User;
use App\Models\Podcast;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Episode extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected function casts(): array
    {
        return [
            'published_at' => 'datetime',
        ];
    }

    public function podcast(): BelongsTo
    {
        return $this->belongsTo(Podcast::class);
    }

    public function scopeRecent(Builder $query): void
    {
        $query->orderBy('published_at', 'desc');
    }

    public function isVisibleTo(?User $user): bool
    {
        return ($this->podcast->isPublished() && $this->isPublished())
            || $this->podcast->isVisibleTo($user);
    }

    public function isEditableBy(?User $user): bool
    {
        return $this->podcast->isOwnedBy($user);
    }

    public function isPublished(): bool
    {
        return $this->published_at !== null;
    }

    public function durationForHumans(): string
    {
        $hours = (int) floor($this->duration / 60 / 60);
        $minutes = (int) round(($this->duration / 60) - ($hours * 60));

        return collect([
            [$hours, 'hr'],
            [$minutes, 'min'],
        ])->reject(function (array $value) {
            return $value[0] === 0;
        })->flatten(1)->implode(' ');
    }
}
