<?php

namespace Database\Factories;

use App\Models\UserRequest;
use Illuminate\Database\Eloquent\Factories\Factory;

class RequestFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = UserRequest::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'request_created_date'  => now(),
            'client_name'           => $this->faker->name,
            'department_id'         => 1,
            'computer_id'           => 1,
            'break_id'              => 1,
            'kind_of_repair'        => 'PERBAIKAN',
            'description'           => $this->faker->name
        ];
    }
}
