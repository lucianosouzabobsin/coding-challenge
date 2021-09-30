<?php

namespace App\Repositories;

use App\Repositories\Contracts\MovementRepositoryInterface;
use App\Models\Movement;

class MovementRepository implements MovementRepositoryInterface
{
    protected $entity;

    public function __construct(Movement $movement)
    {
        $this->entity = $movement;
    }

    /**
     * Return movement
     *
     * @param Integer $id
     * @return array
    */
    public function getMovement($id)
    {
        return $this->entity->where(['id' => $id])->get()->toArray();
    }
}
