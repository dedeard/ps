<?php

namespace Database\Factories;

use App\Models\Drug;
use App\Models\TherapeuticClass;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TherapeuticClass>
 */
class TherapeuticClassFactory extends Factory
{
    protected $model = TherapeuticClass::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word, // Random therapeutic class name
        ];
    }
}
