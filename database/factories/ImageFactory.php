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
            'url' => 'courses/' . $this->faker->image('public/storage/courses', 640, 480, null, false) // false-> imagen.jpg
            // 'imageable_id' => null, // El campo imageable_id es una clave foránea que se debe llenar en el modelo que se está creando
            // 'imageable_type'=> null // El campo imageable_type es una clave foránea que se debe llenar en el modelo que se está creando
        ];
    }
}
