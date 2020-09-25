<?php

namespace Database\Factories;

use App\Models\Phone;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PhoneFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Phone::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'brand' => $this->faker->company,
            'model' => $this->faker->lastName,
            'imageSrc' => $this->faker->imageUrl($width = 640, $height = 480),
            'specs' => json_encode(["CameraQuality"=>"64 MP", "Memory"=>"64 GB RAM", "Resolution"=>"1080x2400", "Network"=>"GSM/HSPA/LTE", "OS"=>"Android 10"]),
            'prepaidcost' => $this->faker->randomNumber(2),
            'postpaidcost' => $this->faker->randomNumber(2),
        ];
    }
}
