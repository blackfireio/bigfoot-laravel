<?php

use Facades\App\BigFoot\UserActivityHelper;
use App\Models\User;

function user_activity_text(User $user)
{
    return UserActivityHelper::getUserActivityText($user);
}
