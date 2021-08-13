<?php

namespace Database\Factories;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

class CustomerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Customer::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'document_number' => $this->faker->word,
            'phone_number' => $this->faker->phoneNumber,
            'mobile_phone_number' => $this->faker->word,
            'email' => $this->faker->safeEmail,
            'postal_code' => $this->faker->postcode,
            'street_number' => $this->faker->numberBetween(0, 1000),
            'street_name' => $this->faker->streetAddress,
            'neighborhood' => $this->faker->word,
            'city' => $this->faker->city,
            'state' => $this->faker->state,
            'complement' => $this->faker->word,
            'contact' => $this->faker->word,
        ];
    }

}
