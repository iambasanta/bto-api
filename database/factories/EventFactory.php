<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'=>$this->faker->sentence(),
            'description'=>$this->faker->sentences(5),
            'address'=>$this->faker->address(),
            'image'=>$this->faker->imageUrl(),
            'ticket_price'=>$this->faker->numberBetween(1,50),
            'total_tickets'=>$this->faker->numberBetween(1,100),
            'date'=>$this->faker->date(),
        ];
    }
}
