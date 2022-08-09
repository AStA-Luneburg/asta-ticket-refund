<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;
use App\Models\User;
use App\Rules\IsUniversityMail;
use App\Rules\NotLeuphanaID;

class AuthenticationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => ['required', 'string', 'email', new IsUniversityMail, new NotLeuphanaID],
            'privacy-check' => ['required', 'accepted'],
        ];
    }

    /**
     * Attempt to authenticate the request's credentials.
     *
     * @return \App\Models\User
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function validateUser()
    {
        // $this->ensureIsNotRateLimited();
        $validated = $this->validated();

        $user = User::where('email', $validated['email'])->first();

        if (!$user) {
            throw ValidationException::withMessages([
                'user-not-found' => trans('app.verify-error.email-not-found', [
                    'email' => $validated['email'],
                    'support-mail' => config('app.support-mail'),
                    'university' => config('app.university-full')
                ]),
            ]);
        }

        return $user;
    }
}
