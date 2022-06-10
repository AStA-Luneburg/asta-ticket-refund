<?php

namespace App\Mail\Actions;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use MagicLink\Actions\ActionAbstract;

class LoginOrRegisterUser extends ActionAbstract
{
    public function __construct(public string $email) {

    }

    public function run() {
        $user = User::where('email', $this->email)->first();

        if (!$user) {
            $user = new User;
            $user->email = $this->email;
            $user->save();
        }

        Auth::login($user);

        return redirect('my-refund');
    }
}
