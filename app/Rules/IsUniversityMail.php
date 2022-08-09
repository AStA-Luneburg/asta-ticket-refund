<?php

namespace App\Rules;

use App\Models\User;
use Illuminate\Contracts\Validation\Rule;

class IsUniversityMail implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $email)
    {
        // Match university mail ending (e.g. @stud.leuphana.de).
        // Admin emails don't need this check, so they can log in.
        if (str_ends_with($email, config('app.mail-ending')) || User::isAdminEmail($email)) {
            return true;
        }

        return false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return __('app.verify-error.not-university-mail', [
            'example-mail' => config('app.example-mail'),
            'university' => config('app.university'),
            'suffix' => config('app.mail-ending')
        ]);
    }
}
