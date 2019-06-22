<?php

namespace App\Http\Controllers\Appraisal;

use App\AppraisalInternal;
use App\Staff;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class StaffInternalAppraisalController extends Controller
{

    public function appraisalStore(Request $request)
    {

        $this->validate($request, [
            'selfAssessment.*' => 'required|numeric',
        ]);

        $internalGoals = AppraisalInternal::where('appraisal_id', $request->appraisalID)->get()->all();

        $i=0;
        foreach ($internalGoals as $internalGoal){
            $internalGoal->staffAppraisalComment = $request->comment[$i];
            $internalGoal->selfAssessment = $request->selfAssessment[$i];
            $internalGoal->save();
            $i++;
        }

        Session::flash('success', 'Submitted, move to the next section.');

        return redirect()->route('staffAppraisalEdit', ['appraisalID' => $request->appraisalID]);

    }

    public function appraisalUpdate(Request $request)
    {

        $this->validate($request, [
            'selfAssessment.*' => 'required|numeric',
        ]);

        $internalGoals = AppraisalInternal::where('appraisal_id', $request->appraisalID)->get()->all();

        $i=0;
        foreach ($internalGoals as $internalGoal){
            $internalGoal->staffAppraisalComment = $request->comment[$i];
            $internalGoal->selfAssessment = $request->selfAssessment[$i];
            $internalGoal->save();
            $i++;
        }

        Session::flash('success', 'Submitted, move to the next section.');

        return redirect()->route('staffAppraisalEdit', ['appraisalID' => $request->appraisalID]);

    }

}
