<?php

namespace App\Http\Controllers;

use App\Rules\MovementExists;
use App\Services\ServicePersonalRecord;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PersonalRecordController extends Controller
{
    protected $servicePersonalRecord;

    public function __construct(ServicePersonalRecord $servicePersonalRecord)
    {
        $this->servicePersonalRecord = $servicePersonalRecord;
    }

    public function list(Request $request)
    {
        $movementId = null;

        $inputs = $request->all();

        if(isset($inputs['movement'])) {
            $movementId = $inputs['movement'];
        }

        $validator = Validator::make($inputs, [
            'movement' => [
                'required',
                'numeric',
                new MovementExists(
                    $movementId,
                    $this->servicePersonalRecord
                )
            ],
        ]);

        if($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()->toArray()
            ], 404);
        }

        return $this->servicePersonalRecord->getRecord($movementId);
    }
}