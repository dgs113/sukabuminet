<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => 1,
            'category_id' => mt_rand(1, 2),
            'title' => fake()->realText(50, 2),
            'slug' => fake()->slug(),
            'excerpt' => fake()->paragraph(),
            // 'body' => fake()->paragraph(mt_rand(5, 10)),

            'body' => collect($this->faker->paragraphs((mt_rand(5, 20))))
                ->map(fn ($p) => "<p>$p</p>")
                ->implode(''),
            'published_at' => fake()->dateTimeBetween('-2 week'),
            'count' => mt_rand(10, 100),
            'is_archive' => fake()->randomElement([true, false]),
            'is_headline' => fake()->randomElement([true, false]),
        ];
    }
}
