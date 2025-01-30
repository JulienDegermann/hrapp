<?php

namespace Database\Factories;

use App\Models\Profile;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Profile>
 */
class ProfileFactory extends Factory
{


    /**
     * The name of the factory's corresponding model.
     * @var string
     */
    protected $model = Profile::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'email' => $this->faker->unique()->safeEmail(),
            'phone' => $this->faker->phoneNumber(),
            'picture' => $this->faker->imageUrl(),
            'date_of_birth' => $this->faker->dateTimeThisCentury(),
            'resume' => $this->faker->text(),
            'linkedin' => $this->faker->url(),
            'github' => $this->faker->url(),
        ];
    }
}
