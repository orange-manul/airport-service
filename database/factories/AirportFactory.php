<?php

namespace Database\Factories;

use App\Models\Airport;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Airport>
 */
class AirportFactory extends Factory
{
    protected $model = Airport::class;

    public function definition(): array
    {
        return [
            'code' => $this->generateAirportCode(),
            'city_ru' => CityProvider::cityRu(),
            'city_en' => CityProvider::cityEn(),
            'area' => $this->faker->optional()->state(),
            'country' => $this->faker->country(),
            'lat' => $this->faker->latitude,
            'lng' => $this->faker->longitude,
            'timezone' => $this->faker->timezone,
        ];
    }


    /**
     * Generate a unique airport code.
     *
     * @return string
     */
    protected function generateAirportCode(): string
    {
        // Generate a random letter (A-Z)
        $letter = chr(rand(65, 90));

        // Generate a random three-digit number
        $number = str_pad(rand(1, 999), 3, '0', STR_PAD_LEFT);

        // Concatenate the letter and number
        return $letter . $number;
    }
}
