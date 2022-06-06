<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class NotLeuphanaID implements Rule
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
    public function passes($attribute, $value)
    {
        $outputs = [];
        preg_match('/^lg\d+@stud.leuphana.de$/', $value, $outputs);

        return count($outputs) == 0;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return __('app.verify-error.not-leuphana-id');
    }
}
