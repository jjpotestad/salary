<?php

namespace Database\Factories;

use App\Models\MonthlyDelivery;
use Illuminate\Database\Eloquent\Factories\Factory;

class MonthlyDeliveryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MonthlyDelivery::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'count_delivery' => $this->faker->randomDigitNotNull,
        'hours_worked' => $this->faker->randomDigitNotNull,
        'date_delivery' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
