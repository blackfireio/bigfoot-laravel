<?php

namespace Database\Factories;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Collection;

class CommentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Comment::class;

    private static $users = [];
    private static $sightings = [];

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'content' => $this->faker->paragraph,
        ];
    }

    public function configure()
    {
        return $this->afterMaking(function (Comment $comment) {
            static $i = 0;
            $outstandingCommentersRangeMax = floor(count(self::$users) / 10);
            if ($i % 5 === 0) {
                // make every 5th comment done by a small set of users
                // Wow! They must *love* Bigfoot!
                $comment->owner()->associate(self::$users[rand(0, $outstandingCommentersRangeMax)]);
            } else {
                $comment->owner()->associate(self::$users[array_rand(self::$users)]);
            }

            $sighting = self::$sightings[array_rand(self::$sightings)];
            $comment->sighting()->associate($sighting);
            $comment->created_at = $this->faker->dateTimeBetween($sighting->created_at, 'now');

            ++$i;
        });
    }

    public function setUsers(Collection $users): self
    {
        foreach ($users as $user) {
            self::$users[] = $user;
        }

        return $this;
    }

    public function setSightings(Collection $sightings): self
    {
        foreach ($sightings as $sighting) {
            self::$sightings[] = $sighting;
        }

        return $this;
    }
}
