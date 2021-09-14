<?php

namespace App\Rules;

use Eyesee\Entities\Thread\Models\Thread;
use Illuminate\Contracts\Validation\Rule;

class ThreadDataRule implements Rule
{
    private int $threadType;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct(int $threadType)
    {
        $this->threadType = $threadType;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute
     * @param mixed $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return match ($this->threadType) {
            Thread::THREAD_TYPE_POST    => !empty($value),
            Thread::THREAD_TYPE_URL     => filter_var($value, FILTER_VALIDATE_URL) !== false,
            Thread::THREAD_TYPE_POLL    => $this->validateJson($value),
            default => true,
        };
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The validation error message.';
    }

    /**
     * @param $json
     * @return bool
     */
    private function validateJson($json): bool
    {
        json_decode($json);
        return json_last_error() === JSON_ERROR_NONE;
    }
}
