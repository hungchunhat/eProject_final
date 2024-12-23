<?php

namespace Database\Factories;

use App\Models\Auction;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Auction>
 */
class AuctionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $start_time = fake()->dateTime();
        return [
            'name' => fake()->name(),
            'description' => fake()->text(),
            'start_time' => $start_time,
            'end_time' => $start_time->modify('+5 hours'),
            'bid_step' => 2
        ];
    }
}
