<?php

namespace Database\Factories;

use App\Models\Image;
use Illuminate\Database\Eloquent\Factories\Factory;

class ImageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Image::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
                                                                                                     // true-> public/storage/cursos/imagen.jpg
            'url' => 'cursos/' . $this->faker->image('public/storage/cursos', 640, 480, null, false) // flase-> imagen.jpg
            // 'imageable_id' => null,
            // 'imageable_type'=> null
        ];
    }
}
