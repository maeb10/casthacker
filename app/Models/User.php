<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Podcast;
use App\Models\Subscription;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function podcasts(): HasMany
    {
        return $this->hasMany(Podcast::class);
    }

    public function subscribedPodcasts(): BelongsToMany
    {
        return $this->belongsToMany(Podcast::class, 'subscriptions')->withTimestamps();
    }

    public function subscriptions(): HasMany
    {
        return $this->hasMany(Subscription::class);
    }

    /* public function subscribesTo(Podcast $podcast): bool
    {
        return $this->subscribedPodcasts()->where($podcast->getQualifiedKeyName(), $podcast->getKey())->count() > 0;
    } */

    public function subscriptionTo(Podcast $podcast): Subscription | null
    {
        return $this->subscriptions()->where('podcast_id', $podcast->id)->first();
    }
}
