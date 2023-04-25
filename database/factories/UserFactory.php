<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'fName' => fake()->name(),
            'mName' => fake()->lastName(),
            'lName' => fake()->lastName(),
            'gender' => 'male',
            'civilStatus' => 'single',
            'phoneNumber' => fake()->phoneNumber(),
            'birthDate' => fake()->dateTime(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'image' => null,
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'region' => 'Region 4',
            'province' => 'cavite',
            'city'  => fake()->city(),
            'barangay' => fake()->streetName(),
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}

            // $table->id();
            // $table->string('fName');
            // $table->string('mName');
            // $table->string('lName');
            // $table->string('email')->unique();
            // $table->timestamp('email_verified_at')->nullable();
            // $table->string('phone_number');
            // $table->string('birthDate');
            // $table->string('password')->default('$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi'); //password
            // //address columns
            // $table->String('region');
            // $table->String('province');
            // $table->String('city');
            // $table->String('barangay');
            
            // $table->enum('role', ['admin','instructor','student' ]);
            // $table->rememberToken();
            // $table->timestamps();