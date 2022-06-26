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
        // $isFirstSave = $user->refund === null;
        // $student = null;

        // if ($isFirstSave) {
        //     // Check if matriculation number is used already
        //     $student = EligibleStudent::where('matriculation_number', $validated['matriculation_number'])->first();

        //     if (!$student) {
        //         throw ValidationException::withMessages([
        //             'matriculation_number' => __('app.verify-error.matriculation-number-not-found', ['support-mail' => config('app.support-mail')]),
        //         ]);
        //     } else if ($student && $student->refund !== null) {
        //         throw ValidationException::withMessages([
        //             'matriculation_number' => __('app.verify-error.matriculation-number-used', ['support-mail' => config('app.support-mail')]),
        //         ]);
        //     }
        // } else {
        //     // If it's not the first save (submit), the matriculation_number cannot be changed,
        //     // so we always just set the validated input to the already set matriculation_number
        //     $validated['matriculation_number'] = $user->refund->matriculation_number;
        //     $student = $user->refund->student;
        // }

        return array_merge($validated, [
            'iban' => IBAN::prettyPrint($validated['iban'])
        ]);
    }
}
