<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class CardNumberFormat implements Rule
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
        if (strlen($value) != 19) return false;

        for ($i = 0; $i < 19; $i++) {
            if (($i >= 0 && $i <= 3) ||
                ($i >= 5 && $i <= 8) ||
                ($i >= 10 && $i <= 13) ||
                ($i >= 15 && $i <= 18)
            ) {
                if (!is_numeric($value[$i])) return false;
            } else {
                if ($value[$i] != ' ') return false;
            }
        }
        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The card number format not match';
    }
}
