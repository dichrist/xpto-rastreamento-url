<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Url;

class UrlFactory extends Factory
{
    protected $model = Url::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'link' => $this->faker->url,
            'content_body' => $this->faker->randomHtml(2,4),
            'status_code' => $this->faker->randomNumber(3)
        ];
    }
}
