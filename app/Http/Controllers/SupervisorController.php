<?php

namespace App\Http\Controllers;

use App\Appraisal;
use App\AppraisalFinance;
use App\Staff;
use Illuminate\Http\Request;

class SupervisorController extends Controller
{

    public function index()
    {

        $appraisals = Appraisal::where('supervisorID', auth()->user()->staff->StaffRef)
            ->where('sentFlag', True)
            ->get()->all();

//        dd($appraisals);

        return view('supervisor.index')->with([
            'appraisals' => $appraisals,
        ]);

    }

    public function appraisal($appraisalID)
    {

        $appraisal_finances = AppraisalFinance::where('appraisal_id', $appraisalID)->get()->all();

        dd($appraisal_finances);


    }

}
