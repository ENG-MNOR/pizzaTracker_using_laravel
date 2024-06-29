<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pizza>
 */
class PizzaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $toppingsChoices=[
            'Extra cheede',
            'Black Olives',
            'pepperoni',
            'suasage',
            'Anchovies',
            'jalapenos',
            'onion',
            'Chicken',
            'Ground Beef',
            'Green Peppers'
        ];

        $toppings=[];

        for($i=1;$i< rand(1,4);$i++){
            $toppings[]=Arr::random($toppingsChoices);
        }
        $toppings=array_unique($toppings);
        return [
            'id'=>rand(11111,99999),
            'user_id'=>rand(1,10),
            'size'=>Arr::random(['Small', 'Medium', 'Large', 'extra-large']),
            'crust'=>Arr::random(['Normal','thin','medium','Garlic']),
            'toppings'=>$toppings,
            'status'=>Arr::random(['Order', 'prepping','Backing','Checking','ready'])
        ];
    }
}
