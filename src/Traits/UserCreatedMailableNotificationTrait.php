<?php

namespace Codersandip\MyFirstPackage\Traits;

use App\Models\User;
use Codersandip\MyFirstPackage\Observers\UserRegisteredObserver;
use Illuminate\Contracts\Mail\Mailable;
use Illuminate\Support\Facades\Mail;

/**
 *
 */
trait UserCreatedMailableNotificationTrait
{
    public static function booted()
    {
        User::observe(UserRegisteredObserver::class);
    }

    public function emailColumnName(): string
    {
        return $this->email;
    }

    public function userCreatedMailableNotification(): Mailable
    {
        return new \Codersandip\MyFirstPackage\Mail\UserCreated($this);
    }

    public function userCreatedMailableNotificationQueue(): bool
    {
        return true;
    }

    public function sendUserCreatedMailableNotification(): void
    {
        # code...
        $mail = Mail::to($this->email);
        if ($this->userCreatedMailableNotificationQueue()) {
            $mail->queue($this->userCreatedMailableNotification($this));

            return;
        }
        $mail->send($this->userCreatedMailableNotification($this));
    }
}
