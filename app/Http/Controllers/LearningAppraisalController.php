<?php

namespace App\Http\Controllers;

use App\AppraisalLearning;
use App\Staff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LearningAppraisalController extends Controller
{

    public function bscLearningStore(Request $request)
    {

        if (!auth()->user()->staff->SupervisorFlag){

            $this->validate($request, [

                'learning_objective.*' => 'required|string',
                'learning_kpi.*' => 'required|string',
                'learning_target.*' => 'required|string',
                'learning_constraint.*' => 'required|string',
                'learning_self_ass.*' => 'required|numeric',

            ]);

            $staff = Staff::where('UserID',auth()->user()->id)->first();

            for($i=0;$i<count($request->learning_objective);$i++){

                $appraisal = new AppraisalLearning;
                $appraisal->objective = $request->learning_objective[$i];
                $appraisal->kpi = $request->learning_kpi[$i];
                $appraisal->target = $request->learning_target[$i];
                $appraisal->constraint = $request->learning_constraint[$i];
                $appraisal->selfAssessment = $request->learning_self_ass[$i];
                $appraisal->supervisorID = $staff->SupervisorID;
                $appraisal->staffID = $staff->StaffRef;
                $appraisal->appraisal_id = $request->appraisalID;
                $appraisal->save();

            }

            Session::flash('success', 'Submitted, move to the next section.');

            return redirect()->route('dashboard', ['appraisalID' => $request->appraisalID]);

        }

    }

    public function updateLearningAppraisal(Request $request)
    {

        $this->validate($request, [

            'learning_objective' => 'required|string',
            'learning_kpi' => 'required|string',
            'learning_target' => 'required|string',
            'learning_constraint' => 'required|string',
            'learning_self_ass' => 'required|numeric',

        ]);

        $appraisal = AppraisalLearning::find($request->learningAppraisalID);

        $appraisal->objective = $request->learning_objective;
        $appraisal->kpi = $request->learning_kpi;
        $appraisal->target = $request->learning_target;
        $appraisal->constraint = $request->learning_constraint;
        $appraisal->selfAssessment = $request->learning_self_ass;

        $appraisal->save();


        Session::flash('success', 'Appraisal Updated!');

        return back();


    }

    public function deleteAppraisals(Request $request)
    {

        $allAppraisalIDs = $request->appraisalIDs;

        foreach ($allAppraisalIDs as $allAppraisalID){

            $appraisal = AppraisalLearning::find($allAppraisalID);

            $appraisal->delete();

        }

        Session::flash('success', 'Appraisal Deleted.');

        return back();

    }

}
