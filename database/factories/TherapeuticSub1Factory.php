<?php

namespace Database\Factories;

use App\Models\TherapeuticClass;
use App\Models\TherapeuticSub1;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TherapeuticSub1>
 */
class TherapeuticSub1Factory extends Factory
{
    protected $model = TherapeuticSub1::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word, // Random name for sub1
            'therapeutic_class_id' => TherapeuticClass::factory(), // Create a therapeutic class and associate it
        ];
    }
}
