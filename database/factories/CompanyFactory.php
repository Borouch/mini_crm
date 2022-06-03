<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Company>
 */
class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $logo_path="storage/logos/logo-placeholder.png";
        return [
            'name'=>$this->faker->company(),
            'email'=>$this->faker->companyEmail(),
            'logo'=>$logo_path,
            'website'=>$this->faker->url(),
        ];
    }
}
