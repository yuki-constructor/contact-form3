<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Contact;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ContactFactory extends Factory
{

    protected $model =Contact::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
        'first_name'=> $this->faker->firstName,
        'last_name'=> $this->faker->lastName,
        'gender'=> $this->faker->numberBetween(1,3),
        'email'=> $this->faker->email,
        'tell'=> $this->faker->numerify('##########'),
        'address'=> $this->faker->address,
        'building'=> $this->faker->Text(8),
        'category_id'=> $this->faker->numberBetween(1,5),
        'detail'=> $this->faker->sentence(),
        ];
    }
}
