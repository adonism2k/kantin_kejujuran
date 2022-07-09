<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class StudentID implements Rule
{
    /**
     * Two last digits are the sum of three first digits.
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
        // An ID should consist of a 5 digits number from 0-9. Two last digits are the sum of three first digits.
        $threeFirstDigits = substr($value, 0, 3);
        $twoLastDigits = (int) substr($value, 3, 2);
        $sumOfThreeFirstDigits = array_sum(str_split($threeFirstDigits));
        if ($sumOfThreeFirstDigits === $twoLastDigits) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The :attribute must be a valid student ID.';
    }
}
