<?php

namespace App\Services;

use App\Repositories\Contracts\MovementRepositoryInterface;
use App\Repositories\Contracts\PersonalRecordRepositoryInterface;
use Carbon\Carbon;

class ServicePersonalRecord
{
    protected $movementRepository;
    protected $personalRecordRepository;

    public function __construct(
        MovementRepositoryInterface $movementRepository,
        PersonalRecordRepositoryInterface $personalRecordRepository
    ) {
        $this->movementRepository = $movementRepository;
        $this->personalRecordRepository = $personalRecordRepository;
    }

    /**
     * Return movement
     *
     * @param Integer $id Movement Id
     * @return array
    */
    public function getMovement($id)
    {
        return $this->movementRepository->getMovement($id);
    }

    /**
     * Returns record list sorted by position
     *
     * @param Integer $id Movement Id
     * @return array
    */
    public function getRecord($movement_id)
    {
        $position = 1;
        $lastValue = 0;

        $highscore =  $this->personalRecordRepository->getRecord($movement_id);

        foreach ($highscore as $key => $personalRecord) {
            $highscore[$key]['position'] = $position;
            $highscore[$key]['value'] = number_format($personalRecord['value'], 1, '.',',');
            $highscore[$key]['date'] = Carbon::parse($personalRecord['date'])->format('Y-m-d');

            if($lastValue == $personalRecord['value']) {
                $highscore[$key]['position'] = $position - 1;
            }

            $lastValue = $personalRecord['value'];
            $position++;
            unset($highscore[$key]['movement']);
        }

        return [
            'movement' => $this->getMovement($movement_id)[0]['name'],
            'highscore' => $highscore
        ];
    }
}
