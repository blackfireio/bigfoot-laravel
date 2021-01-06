<?php

namespace App\BigFoot;

use App\Models\User;

class UserActivityHelper
{
    public function __invoke(User $user)
    {
        return $this->getUserActivityText($user);
    }

    public function getUserActivityText(User $user): string
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
        $commentCount = 0;
        $recentDate = new \DateTimeImmutable('-3 months');
        foreach ($user->comments as $comment) {
            if ($comment->created_at > $recentDate) {
                ++$commentCount;
            }
        }

        return $commentCount;
    }
}
