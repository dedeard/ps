<?php

namespace App\Http\Controllers;

use App\Models\TherapeuticClass;
use App\Models\TherapeuticSub1;
use App\Models\TherapeuticSub2;
use App\Models\TherapeuticSub3;

class TherapeuticController extends Controller
{
    /**
     * Retrieve all therapeutic classes and their related data.
     *
     * @return \Illuminate\Http\Response
     */
    public function getTherapeuticData()
    {
        $data = TherapeuticClass::with(['sub1.sub2.sub3', 'drug', 'sub1.drug', 'sub1.sub2.drug', 'sub1.sub2.sub3.drug'])->get();


        return response()->json($data);
    }
}
