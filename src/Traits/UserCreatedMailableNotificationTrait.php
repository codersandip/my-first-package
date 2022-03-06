<?php

namespace Codersandip\MyFirstPackage\Traits;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Contracts\Mail\Mailable;
use Codersandip\MyFirstPackage\Observers\UserRegisteredObserver;

/**
 * 
 */
trait UserCreatedMailableNotificationTrait
{
    static public function booted()
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

    public function sendUserCreatedMailableNotification() : void
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
