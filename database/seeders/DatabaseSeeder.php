<?php

namespace Database\Seeders;

use App\Models\BigFootSighting;
use App\Models\Comment;
use App\Models\User;
use Database\Factories\BigFootSightingFactory;
use Database\Factories\CommentFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $users = User::factory(100)->create();
        /** @var BigFootSighting $sightings */
        $sightings = BigFootSighting::factory(200)->setUsers($users)->create();
        /** @var Comment $comments */
        $comments = Comment::factory(4000)
            ->setUsers($users)
            ->setSightings($sightings)
            ->create();
    }
}
