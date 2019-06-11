<?php

namespace App\Http\Controllers;

use App\AppraisalFinance;
use App\Staff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class FinanceAppraisalController extends Controller
{


    public function bscFinancialStore(Request $request)
    {

        if (!auth()->user()->staff->SupervisorFlag){

            $this->validate($request, [
                'financial_objective.*' => 'required|string',
                'financial_kpi.*' => 'required|string',
                'financial_target.*' => 'required|string',
//                'financial_constraint.*' => 'required|string',
//                'financial_self_ass.*' => 'required|numeric',
            ]);

            $staff = Staff::where('UserID',auth()->user()->id)->first();

            for($i=0;$i<count($request->financial_objective);$i++){

                $appraisal = new AppraisalFinance;
                $appraisal->objective = $request->financial_objective[$i];
                $appraisal->kpi = $request->financial_kpi[$i];
                $appraisal->target = $request->financial_target[$i];
//                $appraisal->constraint = $request->financial_constraint[$i];
//                $appraisal->selfAssessment = $request->financial_self_ass[$i];
                $appraisal->supervisorID = $staff->SupervisorID;
                $appraisal->staffID = $staff->StaffRef;
                $appraisal->appraisal_id = $request->appraisalID;
                $appraisal->save();

            }

            Session::flash('success', 'Submitted, move to the next section.');

            return redirect()->route('dashboard', ['appraisalID' => $request->appraisalID]);

        }

    }

    public function updateFinanceAppraisal(Request $request)
    {

//        dd($request->all());

        $this->validate($request, [
            'financial_objective' => 'required|string',
            'financial_kpi' => 'required|string',
            'financial_target' => 'required|string',
//            'financial_constraint' => 'required|string',
//            'financial_self_ass' => 'required|numeric',
        ]);

        $appraisal = AppraisalFinance::find($request->financeAppraisalID);

        $appraisal->objective = $request->financial_objective;
        $appraisal->kpi = $request->financial_kpi;
        $appraisal->target = $request->financial_target;
//        $appraisal->constraint = $request->financial_constraint;
//        $appraisal->selfAssessment = $request->financial_self_ass;

        $appraisal->save();

        Session::flash('success', 'Appraisal Updated!.');

        return back();


    }

    public function deleteAppraisals(Request $request)
    {

        $allAppraisalIDs = $request->appraisalIDs;

//        dd($allAppraisalIDs);

        foreach ($allAppraisalIDs as $allAppraisalID){

            $appraisal = AppraisalFinance::find($allAppraisalID);

            $appraisal->delete();

        }

        Session::flash('success', 'Appraisal Deleted.');

        return back();

    }

}
