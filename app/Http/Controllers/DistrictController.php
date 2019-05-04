<?php

namespace App\Http\Controllers;

use App\District;
use App\News;
use App\Organize;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Schema;

class DistrictController extends Controller
{
    //
    public function getDistrict()
    {
        $filterData = Input::get();

        $districts = District::with([
            'getAmphoe:province,amphoe',
            'getAmphoe.getDistrict:id,amphoe,district'
        ])
            ->select(
                'province'
            )
            ->distinct();

        $districts = $this->filter($districts, $filterData);

        return $districts;
    }

    public function apiGetDistricts()
    {
        $districts = $this->getDistrict()->get();

        return response()->json($districts);
    }


    public function filter($model, $filterData)
    {
        foreach ($filterData as $key => $value) {

            if (Schema::hasColumn('districts', $key)) {
                if (!empty($value)) {
                    $model->where("$key", 'LIKE', "%$value%");
                }
            }
        }
        return $model;
    }
}
