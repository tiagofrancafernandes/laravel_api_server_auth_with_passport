<?php

namespace App\Rules;

use App\User;
use Illuminate\Contracts\Validation\Rule;

class Validated implements Rule
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
        $user = User::where($attribute/*email*/, $value/*email from post*/)
            ->where('token', '=', '')->whereNotNull('email_verified_at');
        $test = ($user->count() > 0);
        return $test;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return trans('validation.account.validated');
    }
}
