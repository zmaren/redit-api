<?php

namespace App\Rules;

use Eyesee\Entities\Community\Models\Community;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\DB;

class CommunityRule implements Rule
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
        return DB::table('communities')
            ->where(Community::ID, $value)
            ->where(Community::USER_ID, auth()->id())
            ->exists();
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'A community does not belongs to the current user.';
    }
}
