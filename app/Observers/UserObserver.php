<?php

namespace App\Observers;
use App\Models\User;
use App\Models\UserLog;

class UserObserver
{
    public function updating(User $user)
    {
        $originalData = $user->getOriginal();
        $newData = $user->getAttributes();

        UserLog::create([
            'user_id' => $user->id,
            'old_data' => json_encode($originalData),
            'new_data' => json_encode($newData),
        ]);
    }
}
