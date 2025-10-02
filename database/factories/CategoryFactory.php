<?php

namespace Database\Factories;

use App\Models\Category;   // 👈 Importante
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CategoryFactory extends Factory
{
    /**
     * El modelo asociado a esta factory.
     *
     * @var string
     */
    protected $model = Category::class;  // 👈 Enlaza con App\Models\Category

    /**
     * Define el estado por defecto del modelo.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = $this->faker->unique()->word();

        return [
            'name' => $name,
            'slug' => Str::slug($name),
            'image' => 'categories/' . $this->faker->image('public/storage/categories', 640, 480, null, false),
            'is_featured' => $this->faker->boolean(),
            'status'      => $this->faker->boolean(),
        ];
    }
}
