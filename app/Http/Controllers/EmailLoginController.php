<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\AuthenticationRequest;
use App\Mail\LoginCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class EmailLoginController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function authenticateWithEmail(AuthenticationRequest $request)
    {
        Log::debug('EmailLoginController: authenticateWithEmail: ', [ 'request' => $request->all() ]);
        $user = $request->findUser();

        if (!$user) {
            return redirect()->back()->withErrors(['email' => 'Invalid email or password.']);
        }

        // Send mail with login code
        Mail::to($user->email)->send(new LoginCode());

        return redirect(route('verify'));
    }
}
