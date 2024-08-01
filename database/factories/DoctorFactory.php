<?php

namespace Database\Factories;

use App\Models\Doctor;
use Illuminate\Database\Eloquent\Factories\Factory;

class DoctorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Doctor::class;

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
            'birth_date' => $this->faker->date,
            'address' => $this->faker->address,
            'telephone' => $this->faker->phoneNumber,
            'email' => $this->faker->email,
            'especialidad' => $this->faker->randomElement(['Odontología', 'Pediatría', 'Ginecología','Cardiología','Pediatría']),
            'professional_card' => $this->faker->randomNumber(6),
        ];
    }
}
