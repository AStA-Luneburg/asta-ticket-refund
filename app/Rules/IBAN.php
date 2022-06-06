<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class IBAN implements Rule
{
    protected $error = null;

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
        $iban = new \CMPayments\IBAN($value);

        // validate the IBAN
        if (!$iban->validate($this->error)) {
            return false;
        }

        // pretty print IBAN
        $formatted_iban = $iban->format();
        return $formatted_iban;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return __('app.invalid-iban');
    }

    public static function prettyPrint(string $iban) {
        $iban = new \CMPayments\IBAN($iban);

        // validate the IBAN
        if (!$iban->validate()) {
            throw new \Exception('Invalid IBAN');
        }

        // pretty print IBAN
        return $iban->format();
    }
}
