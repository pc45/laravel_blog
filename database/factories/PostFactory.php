<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;
    public $toInsert;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence,
            'slug' => $this->faker->slug(3),
            'excerpt' => $this->faker->sentence(rand(5,10)),
            'body' =>  $this->faker->paragraph,
            'category_id' => Category::factory(),
            'user_id'=>User::factory(),
        ];
    }
}
