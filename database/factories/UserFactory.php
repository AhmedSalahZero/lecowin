<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => 'admin',
            'email' =>'admin@admin.com',
            'phone'=>$this->faker->phoneNumber,
            'address'=>$this->faker->address,
            'passport_info'=>$this->faker->imageUrl(),
            'image'=>$this->faker->imageUrl(),
            'email_verified_at' => now(),
            'password' => '$2y$10$0H/EVRW3G8RbhIR4rLkjHeBdro6BRhC5iml1D1xVW8T4NzTRt1SPy', // password
            'remember_token' => Str::random(10),
        ];
    }
}
