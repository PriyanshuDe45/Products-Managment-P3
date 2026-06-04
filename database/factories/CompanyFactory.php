<?php

namespace Database\Factories;

use App\Models\companies;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class companiesFactory extends Factory
{
    protected $model = companies::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'address' => $this->faker->address(),
            'telephone' => $this->faker->phoneNumber(),
            'email' => $this->faker->unique()->companyEmail(),
            'is_active' => $this->faker->boolean(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
