<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [

                'event_name' => $this->faker->sentence(),
                'event_date' =>now(),
                'event_place' =>$this->faker->city,
                'event_picture'=> $this->faker->imageUrl($width = 200, $height = 200),
                'event_description'=>$this->faker->text(),
                'updated_at'=>now(),
                'created_at'=>now()

        ];
    }
}
