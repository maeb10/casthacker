<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SubscriptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $me = User::find(2);

        $me->subscribedPodcasts()->attach([1, 2, 3, 4, 5, 6, 7]);
    }
}
