<?php

namespace App\Repositories;

use App\Repositories\Contracts\PersonalRecordRepositoryInterface;
use App\Models\PersonalRecord;

class PersonalRecordRepository implements PersonalRecordRepositoryInterface
{
    protected $entity;

    public function __construct(PersonalRecord $personalRecord)
    {
        $this->entity = $personalRecord;
    }

    /**
     * Return list personal record
     *
     * @param Integer $id Movement Id
     * @return array
    */
    public function getRecord($movement_id)
    {
        return $this->entity->selectRaw('
                user.name,
                movement.name as movement,
                personal_record.value,
                personal_record.date')
            ->join('user','user.id','=','personal_record.user_id')
            ->join('movement','movement.id','=','personal_record.movement_id')
            ->where(['personal_record.movement_id' => $movement_id])
            ->orderBy('personal_record.value', 'DESC')
            ->get()
            ->toArray();
    }
}
