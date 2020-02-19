<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class DateFormaBeb implements Rule
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
    public function passes($attribute, $rules)
    {
       
        $date = Carbon\Carbon::parse($date_from);
        $sixdays = $date->addDays(6);


    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    { 

        $rule['return_date'] = 'required|date|before:'.$sixdays
         return 'please get the date after 15 days';
    }
}
