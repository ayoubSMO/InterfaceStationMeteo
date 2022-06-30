<?php

namespace Database\Factories;

use App\Models\Filiere;
use Illuminate\Database\Eloquent\Factories\Factory;

class FiliereFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Filiere::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'Nom_Filiere' => $this->faker->name(),
        ];
    }
}
