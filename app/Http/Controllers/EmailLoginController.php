<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthenticationRequest;
use App\Mail\Actions\LoginOrRegisterUser;
use App\Mail\VerificationMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use MagicLink\Actions\LoginAction;
use MagicLink\MagicLink;

class EmailLoginController extends Controller
{
    /**
     * Display the index view.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function index(Request $request)
    {
        return $request->user() !== null
            ? redirect('my-refund')
            : redirect('welcome');
    }

    /**
     * Handle an incoming request.
     *
     * @param  \App\Http\Requests\Request  $request
     */
    public function showWelcomePage(Request $request) {
        return view('welcome');
    }

    /**
     * Handle an incoming request.
     *
     * @param  \App\Http\Requests\Request  $request
     */
    public function showVerificationPage(Request $request) {
        if ($request->input('reset_email')) {
            session()->forget('verify_email');
        }

        return session()->has('verify_email')
            ? view('check-mail', [
                'email' => session()->get('verify_email')
              ])
            : view('verify');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\AuthenticationRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function sendAuthenticationVerification(AuthenticationRequest $request)
    {
        Log::debug('@sendAuthenticationVerification: ', [ 'request' => $request->all() ]);

        $validated = $request->validated();
        $email = $validated['email'];

        $magicLink = MagicLink::create(new LoginOrRegisterUser($email));

        // Send mail with login code
        Mail::to($email)->send(new VerificationMail($magicLink->url));

        session()->put('verify_email', $email);

        return redirect('verify');
    }
}
