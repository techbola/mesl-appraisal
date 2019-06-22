<?php

namespace App\Http\Controllers\Appraisal;

use App\AppraisalCustomer;
use App\Staff;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class StaffCustomerAppraisalController extends Controller
{

    public function appraisalStore(Request $request)
    {

        $this->validate($request, [
            'selfAssessment.*' => 'required|numeric',
        ]);

        $customerGoals = AppraisalCustomer::where('appraisal_id', $request->appraisalID)->get()->all();

        $i=0;
        foreach ($customerGoals as $customerGoal){
            $customerGoal->staffAppraisalComment = $request->comment[$i];
            $customerGoal->selfAssessment = $request->selfAssessment[$i];
            $customerGoal->save();
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

        $customerGoals = AppraisalCustomer::where('appraisal_id', $request->appraisalID)->get()->all();

        $i=0;
        foreach ($customerGoals as $customerGoal){
            $customerGoal->staffAppraisalComment = $request->comment[$i];
            $customerGoal->selfAssessment = $request->selfAssessment[$i];
            $customerGoal->save();
            $i++;
        }

        Session::flash('success', 'Saved, move to the next section.');

        return redirect()->route('staffAppraisalEdit', ['appraisalID' => $request->appraisalID]);

    }

}
