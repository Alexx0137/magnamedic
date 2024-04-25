<?php

namespace Database\Factories;

use App\Http\modules\Patients\Models\Patient;
use Illuminate\Database\Eloquent\Factories\Factory;

class PatientFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Patient::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'identification_type_id' => $this->faker->numberBetween(1, 2),
            'identification' => $this->faker->randomNumber(6),
            'name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'gender_id' => $this->faker->numberBetween(1, 2),
            'date_of_birth' => $this->faker->date,
            'address' => $this->faker->address,
            'city' => $this->faker->city,
            'telephone' => $this->faker->phoneNumber,
            'email' => $this->faker->email,
            'blood_type_id' => $this->faker->numberBetween(1, 4),
        ];
    }
}
