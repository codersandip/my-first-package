<?php

namespace Codersandip\MyFirstPackage\Contracts;

use Illuminate\Contracts\Mail\Mailable;

interface UserCreatedMailableNotificationContracts
{
    public function emailColumnName(): string;
    public function userCreatedMailableNotification(): Mailable;
    public function userCreatedMailableNotificationQueue(): bool;
    public function sendUserCreatedMailableNotification() : void;
}
