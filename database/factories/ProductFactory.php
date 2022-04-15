<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $product_name = $this->faker->unique->words(2,true);
        return [
            'name'=>$product_name,
            'slug'=>Str::slug($product_name),
            'regular_price'=>$this->faker->numberBetween(10,500),
            'short_description'=>$this->faker->text(200),
            'description'=>$this->faker->text(500),
            'stock_status'=>'inStock',
            'quantity'=>$this->faker->numberBetween(5,20),
            'image'=>'digital_'.$this->faker->unique()->numberBetween(1,22).".jpg",
            'featured'=>true,
            'category_id'=>$this->faker->numberBetween(1,5),
        ];
    }
}
