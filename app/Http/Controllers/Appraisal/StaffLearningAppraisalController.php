<?php

namespace App\Http\Controllers\Appraisal;

use App\AppraisalLearning;
use App\Staff;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class StaffLearningAppraisalController extends Controller
{

    public function appraisalStore(Request $request)
    {

        $this->validate($request, [
            'selfAssessment.*' => 'required|numeric',
        ]);

        $learningGoals = AppraisalLearning::where('appraisal_id', $request->appraisalID)->get()->all();

        $i=0;
        foreach ($learningGoals as $learningGoal){
            $learningGoal->staffAppraisalComment = $request->comment[$i];
            $learningGoal->selfAssessment = $request->selfAssessment[$i];
            $learningGoal->save();
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

        $learningGoals = AppraisalLearning::where('appraisal_id', $request->appraisalID)->get()->all();

        $i=0;
        foreach ($learningGoals as $learningGoal){
            $learningGoal->staffAppraisalComment = $request->comment[$i];
            $learningGoal->selfAssessment = $request->selfAssessment[$i];
            $learningGoal->save();
            $i++;
        }

        Session::flash('success', 'Submitted, move to the next section.');

        return redirect()->route('staffAppraisalEdit', ['appraisalID' => $request->appraisalID]);

    }

}
