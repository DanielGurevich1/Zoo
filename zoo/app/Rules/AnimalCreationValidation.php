<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\Manager;
use Illuminate\Http\Request;
use App\Models\Rusys;
use App\Models\Animal;

class AnimalCreationValidation implements Rule
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


        return $value >= 2000 && $value <= date('Y');
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Animal age is wrong';
    }
}