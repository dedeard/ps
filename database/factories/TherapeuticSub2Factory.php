<?php

namespace Database\Factories;

use App\Models\TherapeuticSub1;
use App\Models\TherapeuticSub2;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TherapeuticSub2>
 */
class TherapeuticSub2Factory extends Factory
{
    protected $model = TherapeuticSub2::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word, // Random name for sub2
            'sub1_id' => TherapeuticSub1::factory(), // Create a sub1 and associate it
        ];
    }
}
