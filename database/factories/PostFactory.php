<?php

namespace Database\Factories;

use App\Models\Post;
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

        $paragraphs = $this->faker->paragraphs(rand(2, 6));

        foreach($paragraphs as $paragraph){
            $this->toInsert .=  $paragraph;
        }



        return [
            'title' => $this->faker->text(40),
            'slug' => $this->faker->slug(3),
            'excerpt' => $this->faker->sentence(rand(5,10)),
            'body' =>  $this->toInsert,
            'category_id' => rand(1,3),
        ];
    }
}
