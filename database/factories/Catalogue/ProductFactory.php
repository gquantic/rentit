<?php

namespace Database\Factories\Catalogue;

use App\Models\Catalogue\Category;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Catalogue\Product>
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
        $images = [
            'ps5_1.jpg',
            'ps5_2.jpg',
            'ps5_3.jpg',
        ];

        $title = $this->faker->jobTitle();
        $category = Category::query()->inRandomOrder()->first();

        return [
            'user_id' => User::query()->inRandomOrder()->first()->id,
            'category_id' => $category->id,
            'images' => [$images[rand(0,2)], $images[rand(0,2)]],
            'slug' => Str::slug($category->title . '_' . $title . '_' . rand(999, 999999) . '_' . Carbon::now()->format('d_m_H_i_s')),
            'title' => $title,
            'description' => $this->faker->text(200),
            'prices' => [
                '1' => rand(100, 1000),
                '2' => rand(1000, 3000),
                '3' => rand(3000, 5000),
            ],
            'published' => rand(0,1),
        ];
    }
}
