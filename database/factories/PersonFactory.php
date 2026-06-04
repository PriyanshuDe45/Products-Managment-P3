<?php

namespace Database\Factories;

use App\Models\companies;
use App\Models\people;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class peopleFactory extends Factory
{
    protected $model = people::class;

    public function definition()
    {
        return [
            'type' => $this->faker->word(),
            'name' => $this->faker->name(),
            'mobile' => $this->faker->word(),
            'email' => $this->faker->unique()->safeEmail(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

            'companies_id' => companies::factory(),
        ];
    }
}
