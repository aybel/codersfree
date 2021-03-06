<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name=$this->faker->unique()->word(20);
        $slug=Str::slug($name);
        return [
            'name'=>$name,
            'slug'=>$slug,
            'extract'=>$this->faker->text(250),
            'body'=>$this->faker->text(2000),
            'status'=>$this->faker->randomElement([Post::BORRADOR,Post::PUBLICADO]),
            'category_id'=>Category::all()->random()->id,
            'user_id'=>User::all()->random()->id            
        ];
    }
}
