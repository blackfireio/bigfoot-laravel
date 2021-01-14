<?php

namespace App\BigFoot;

use App\Models\Comment;
use App\Models\User;
use Illuminate\Support\Facades\Cache;

class UserActivityHelper
{
    public function __invoke(User $user)
    {
        return $this->getUserActivityText($user);
    }

    public function getUserActivityText(User $user): string
    {
        $key = sprintf('user_activity_text_%s', $user->id);
        $activityText = Cache::remember($key, 3600, function () use ($user) {
            return $this->calculateActivityText($user);
        });

        return $activityText;
    }

    /**
     * @param User $user
     * @return string
     */
    private function calculateActivityText(User $user): string
    {
        $commentCount = $this->countRecentCommentsForUser($user);

        if ($commentCount > 50) {
            return 'bigfoot fanatic';
        }

        if ($commentCount > 30) {
            return 'believer';
        }

        if ($commentCount > 20) {
            return 'hobbyist';
        }

        return 'skeptic';
    }

    private function countRecentCommentsForUser(User $user): int
    {
        $recentDate = new \DateTimeImmutable('-3 months');
        return Comment::whereOwnerId($user->id)
            ->where('created_at', '>', $recentDate)
            ->count();
    }
}
