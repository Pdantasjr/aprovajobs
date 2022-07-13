<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class JobsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->jobTitle;
        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'description' => $this->faker->text(300),
            'status' => rand(0, 8),
            'job_author' => 1,
            'job_category' => rand(1, 10),
            'deadline' => $this->faker->date(),
        ];
    }
}
