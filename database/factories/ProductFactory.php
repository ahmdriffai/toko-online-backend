<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $category = Category::factory()->create();
        return [
            'name' => $this->faker->word(2),
            'category_id' => $category->id,
            'price' => $this->faker->numberBetween(10000, 1000000),
            'description' => $this->faker->text(),
            'image_id' => null,
        ];
    }
}
