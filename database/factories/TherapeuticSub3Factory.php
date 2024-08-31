<?php

namespace Database\Factories;

use App\Models\TherapeuticSub2;
use App\Models\TherapeuticSub3;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TherapeuticSub3>
 */
class TherapeuticSub3Factory extends Factory
{
    protected $model = TherapeuticSub3::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word, // Random name for sub3
            'sub2_id' => TherapeuticSub2::factory(), // Create a sub2 and associate it
        ];
    }
}
