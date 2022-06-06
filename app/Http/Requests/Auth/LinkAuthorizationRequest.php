<?php

namespace App\Http\Requests\Auth;

use App\Models\AccessCode;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class LinkAuthorizationRequest extends FormRequest
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
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function validateToken()
    {
        $validated = $this->validated();
        $email = $validated['email'];
        $token = $validated['token'];

        $accessCode = AccessCode::where('email', $email)->firstOrFail();

        if (!Hash::check($token, $accessCode->token)) {
            Log::debug('@validateToken: Invalid token', [ 'token' => $token ]);

            return redirect()->back()->withErrors(['token' => 'Invalid token.']);
        }

        if ($accessCode->used_at) {
            return redirect()->back()->withErrors(['token' => 'Token already used.']);
        }

        return $accessCode;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'token' => 'required|string',
            'email' => 'required|string|email',
        ];
    }
}
