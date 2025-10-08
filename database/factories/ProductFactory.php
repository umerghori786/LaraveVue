<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {   
        $random_images = ['https://picsum.photos/seed/p3/600/400','https://picsum.photos/seed/p2/600/400','https://picsum.photos/seed/p1/600/400','https://picsum.photos/seed/p4/600/400','https://picsum.photos/seed/p5/600/400'];


        return [
            'title' => fake()->name(),
            'content' => fake()->paragraph(),
            'url' => \Arr::random($random_images)
        ];
    }
}
