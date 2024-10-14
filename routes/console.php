<?php

use App\Models\User;
use Illuminate\Support\Facades\Artisan;


/*
|--------------------------------------------------------------------------
| Console Routes
|-------------------------------------------------------------------------
*/

Artisan::command('make:admin', function (User $user) {
    $username = $this->ask('Enter The user name');
    $useremail = $this->ask('Enter The user email');
    $userpassword = $this->ask('Enter The user password');
    $this->info($username);
    $user->name = $username;
    $user->email = $useremail;
    $user->password = bcrypt($userpassword);
    if ($user->save()) {
        $this->info('User saved');
    } else {
        $this->info('unable to save user');
    }
});
