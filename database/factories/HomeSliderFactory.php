<?php

namespace Database\Factories;

use App\Models\HomeSlider;
use Illuminate\Database\Eloquent\Factories\Factory;

class HomeSliderFactory extends Factory
{
    protected $model = HomeSlider::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title'=>$this->faker->text(30),
            'subtitle'=>$this->faker->text(10),
            'link'=>$this->faker->url,
            'price'=>$this->faker->numberBetween(10,300),
            'image'=>'assets/images/main-slider-3-2.jpg',
        ];
    }
}
