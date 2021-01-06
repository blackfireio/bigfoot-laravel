<?php

namespace Database\Factories;

use App\Models\BigFootSighting;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\Factory;

class BigFootSightingFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = BigFootSighting::class;

    private static $users = [];

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->realText(80),
            'description' => $this->faker->paragraph,
            'confidence_index' => mt_rand(1, 10),
            'score' => 0,
            'latitude' => $this->faker->latitude,
            'longitude' => $this->faker->longitude,
            'created_at' => $this->faker->dateTimeBetween('-6 months', 'now'),
        ];
    }

    public function configure()
    {
        return $this->afterMaking(function (BigFootSighting $sighting) {
            $sighting->owner()->associate(self::$users[array_rand(self::$users)]);
        });
    }

    public function setUsers(Collection $users): self
    {
        foreach ($users as $user) {
            self::$users[] = $user;
        }

        return $this;
    }
}
