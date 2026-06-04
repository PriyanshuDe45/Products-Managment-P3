<?php

namespace Database\Factories;

use App\Models\companies;
use App\Models\products;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class productsFactory extends Factory
{
    protected $model = products::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'name_fr' => $this->faker->name(),
            'desc' => $this->faker->word(),
            'desc_fr' => $this->faker->word(),
            'brand' => $this->faker->word(),
            'country' => $this->faker->country(),
            'gross' => $this->faker->randomFloat(),
            'net' => $this->faker->randomFloat(),
            'weight' => $this->faker->word(),
            'gtin' => $this->faker->word(),
            'image_path' => $this->faker->word(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

            'companies_id' => companies::factory(),
        ];
    }
}
