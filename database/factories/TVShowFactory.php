<?php

namespace Database\Factories;

use App\Models\Presenter;
use App\Models\Studio;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TVShow>
 */
class TVShowFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word(),
            'description' => $this->faker->text(),
            'duration' => random_int(50,200),
            'created_at'=>now(),
            'updated_at'=>now(),
            'studio_id'=>Studio::find(4),
            'presenter_id'=>Presenter::factory()
        ];
    }
}
