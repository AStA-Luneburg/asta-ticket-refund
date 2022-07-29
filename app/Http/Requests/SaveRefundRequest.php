<?php

namespace App\Http\Requests;

use App\Models\EligibleStudent;
use App\Models\User;
use App\Rules\IBAN;
use App\Rules\MatriculationNumber;
use Illuminate\Auth\Events\Lockout;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class SaveRefundRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user() !== null;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'iban' => ['required', 'string', 'max:255', new IBAN],
            // 'matriculation_number' => ['required', 'string', new MatriculationNumber],

            'privacy-check' => ['required', 'accepted'],
        ];
    }

    public function validate() {
        $validated = $this->validated();
        $user = $this->user();

        // Deny submission, if the User has an exported Refund associated with it
        if ($user->refund !== null && $user->refund['export_id'] !== null) {
            return abort(403);
        }

        return array_merge($validated, [
            'iban' => IBAN::prettyPrint($validated['iban'])
        ]);
    }
}
