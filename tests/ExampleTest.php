<?php


use Illuminate\Support\Facades\Mail;

it('can test', function () {
    Mail::fake();
    \Codersandip\MyFirstPackage\Tests\Models\User::factory(1)->create();
    expect(true)->toBeTrue();
});
