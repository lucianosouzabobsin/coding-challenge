<?php

namespace App\Rules;

use App\Services\ServicePersonalRecord;
use Illuminate\Contracts\Validation\Rule;

class MovementExists implements Rule
{
    protected $movementId;
    protected $servicePersonalRecord;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($id, ServicePersonalRecord $servicePersonalRecord)
    {
        $this->movementId = $id;
        $this->servicePersonalRecord = $servicePersonalRecord;
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
        $movement = $this->servicePersonalRecord->getMovement($this->movementId);
        return !empty($movement);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Movement not exists.';
    }
}
