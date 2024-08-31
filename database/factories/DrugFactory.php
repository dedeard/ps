<?php

namespace Database\Factories;

use App\Models\Drug;
use App\Models\TherapeuticClass;
use App\Models\TherapeuticSub1;
use App\Models\TherapeuticSub2;
use App\Models\TherapeuticSub3;
use Illuminate\Database\Eloquent\Factories\Factory;

class DrugFactory extends Factory
{
    protected $model = Drug::class;

    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'therapeutic_type' => $this->faker->randomElement(['class', 'sub1', 'sub2', 'sub3']),
            'therapeutic_id' => function (array $attributes) {
                switch ($attributes['therapeutic_type']) {
                    case 'class':
                        return TherapeuticClass::factory()->create()->id;
                    case 'sub1':
                        return TherapeuticSub1::factory()->create()->id;
                    case 'sub2':
                        return TherapeuticSub2::factory()->create()->id;
                    case 'sub3':
                        return TherapeuticSub3::factory()->create()->id;
                }
            },
        ];
    }
}
