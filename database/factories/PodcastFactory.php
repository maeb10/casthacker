<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Podcast>
 */
class PodcastFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'title' => 'Example Podcast',
            'description' => 'An example podcast about examples.',
            'website' => 'http://example.com',
            'cover_path' => 'images/podcast-art/bike-shed.jpeg',
        ];
    }

    /**
     * Indicate that the podcast is published.
     */
    public function published(): Factory
    {
        return $this->state(function (array $attributes) {
            return [
                'published_at' => fake()->dateTimeBetween('-4 years'),
            ];
        });
    }
}
