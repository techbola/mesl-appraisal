<?php

namespace App\Http\Controllers\Appraisal;

use App\AppraisalFinance;
use App\Staff;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class StaffFinancialAppraisalController extends Controller
{

    public function appraisalStore(Request $request)
    {

        $this->validate($request, [
            'selfAssessment.*' => 'required|numeric',
        ]);

        $financeGoals = AppraisalFinance::where('appraisal_id', $request->appraisalID)->get()->all();

        $i=0;
        foreach ($financeGoals as $financeGoal){
            $financeGoal->staffAppraisalComment = $request->comment[$i];
            $financeGoal->selfAssessment = $request->selfAssessment[$i];
            $financeGoal->save();
            $i++;
        }

        Session::flash('success', 'Saved, move to the next section.');

        return redirect()->route('staffAppraisalEdit', ['appraisalID' => $request->appraisalID]);

    }

    public function appraisalUpdate(Request $request)
    {

        $this->validate($request, [
            'selfAssessment.*' => 'required|numeric',
        ]);

        $financeGoals = AppraisalFinance::where('appraisal_id', $request->appraisalID)->get()->all();

        $i=0;
        foreach ($financeGoals as $financeGoal){
            $financeGoal->staffAppraisalComment = $request->comment[$i];
            $financeGoal->selfAssessment = $request->selfAssessment[$i];
            $financeGoal->save();
            $i++;
        }

        Session::flash('success', 'Saved, move to the next section.');

        return redirect()->route('staffAppraisalEdit', ['appraisalID' => $request->appraisalID]);

    }

}
