<?php

namespace Codersandip\MyFirstPackage\Observers;

use App\Models\User;
use Codersandip\MyFirstPackage\Contracts\UserCreatedMailableNotificationContracts;

class UserRegisteredObserver
{
    /**
     * Handle the User "created" event.
     *
    //  * @param  \App\Models\User  $user
     * @return void
     */
    public function created(UserCreatedMailableNotificationContracts $user)
    {
        $user->sendUserCreatedMailableNotification();
    }
}
