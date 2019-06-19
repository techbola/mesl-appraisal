<?php

namespace App\Http\Controllers;

use App\Appraisal;
use App\AppraisalComment;
use App\AppraisalCustomer;
use App\AppraisalFinance;
use App\AppraisalInternal;
use App\AppraisalLearning;
use App\AppraisalSignature;
use App\Behavioural;
use App\BehaviouralItem;
use App\Level;
use App\Mail\ApproveStaffGoals;
use App\Mail\HrApproveGoal;
use App\Mail\HrRejectGoal;
use App\Mail\HrSupervisorApproveGoal;
use App\Mail\HrSupervisorRejectGoal;
use App\Mail\RejectStaffGoals;
use App\Staff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class HrController extends Controller
{

    public function index()
    {

        $behaviourals = Behavioural::all();

        return view('hr.index')->with([
            'behaviourals' => $behaviourals,
        ]);

    }

    public function behaviouralItems()
    {

        $behavioural_items = BehaviouralItem::all();
        $behaviourals = Behavioural::all();
        $levels = Level::all();

        return view('hr.behavioural_items')->with([
            'behavioural_items' => $behavioural_items,
            'behaviourals' => $behaviourals,
            'levels' => $levels,
        ]);

    }

    public function hrStaffGoals()
    {

        $appraisals = Appraisal::where('hrID', auth()->user()->staff->StaffRef)
            ->where('sentFlag', True)
            ->where('status', 4)
            ->orWhere('status', 6)
            ->get()->all();

        return view('hr.goals.index')->with([
            'appraisals' => $appraisals,
        ]);
    }

    public function appraisal($appraisalID)
    {

        $ap = Appraisal::find($appraisalID);

        $appraisal_finances = AppraisalFinance::where('appraisal_id', $appraisalID)->get();
        $appraisal_customers = AppraisalCustomer::where('appraisal_id', $appraisalID)->get();
        $appraisal_internals = AppraisalInternal::where('appraisal_id', $appraisalID)->get();
        $appraisal_learnings = AppraisalLearning::where('appraisal_id', $appraisalID)->get();

        $comments = AppraisalComment::where('appraisal_id', $appraisalID)->first();
        $signatures = AppraisalSignature::where('appraisal_id', $appraisalID)->first();

        $appraisal = Appraisal::find($appraisalID);
        $staffName = $appraisal->employee_name;

        $staff = Staff::find($appraisal->staffID);

        $staffBehaviouralCats = [];

        $staff_behavioural_items_catids = BehaviouralItem::where('level_id', $staff->user->level_id)->pluck('behaviouralCat_id')->all();

        foreach ($staff_behavioural_items_catids as $staff_behavioural_items_catid){
            array_push($staffBehaviouralCats, (int) $staff_behavioural_items_catid);
        }

        $behaviourals = Behavioural::pluck('id')->all();

        $behaviourals2 = array_intersect ($behaviourals, $staffBehaviouralCats);

        $behaviourals3 = Behavioural::whereIn('id', $behaviourals2)->get();

        return view('hr.goals.appraisal')->with([
            'appraisal_finances' => $appraisal_finances,
            'appraisal_customers' => $appraisal_customers,
            'appraisal_internals' => $appraisal_internals,
            'appraisal_learnings' => $appraisal_learnings,
            'comments' => $comments,
            'signatures' => $signatures,
            'appraisalID' => $appraisalID,
            'staffName' => $staffName,
            'behaviourals' => $behaviourals3,
            'staffLevelID' => $staff->user->level_id,
            'ap' => $ap,
        ]);

    }

    public function goalsApproval(Request $request, $appraisalID)
    {

        switch ($request->input('action')) {

            case 'approve':

                $appraisal = Appraisal::find($appraisalID);

                $staffID = $appraisal->staffID;
                $supervisorID = $appraisal->supervisorID;

                $staff = Staff::find($staffID);
                $staff_email = $staff->user->email;

                $supervisor = Staff::find($supervisorID);
                $supervisor_email = $supervisor->user->email;

                Mail::to($staff_email)->send(new HrApproveGoal($staff, $appraisal));
                Mail::to($supervisor_email)->send(new HrSupervisorApproveGoal($staff, $appraisal));

                $appraisal->status = 6;

                $appraisal->save();

                Session::flash('success', 'Goals Approved!');

                return redirect()->route('hrStaffGoals');

                break;

            case 'reject':

                $financialComments = $request->financial_comment;
                $customerComments = $request->customer_comment;
                $internalComments = $request->internal_comment;
                $learningComments = $request->learning_comment;

                $financeGoals = AppraisalFinance::where('appraisal_id', $appraisalID)->get()->all();
                $customerGoals = AppraisalCustomer::where('appraisal_id', $appraisalID)->get()->all();
                $internalGoals = AppraisalInternal::where('appraisal_id', $appraisalID)->get()->all();
                $learningGoals = AppraisalLearning::where('appraisal_id', $appraisalID)->get()->all();

                $i=0;
                foreach ($financeGoals as $financeGoal){
                    $financeGoal->hrComment = $financialComments[$i];
                    $financeGoal->save();
                    $i++;
                }

                $j=0;
                foreach ($customerGoals as $customerGoal){
                    $customerGoal->hrComment = $customerComments[$j];
                    $customerGoal->save();
                    $j++;
                }

                $k=0;
                foreach ($internalGoals as $internalGoal){
                    $internalGoal->hrComment = $internalComments[$k];
                    $internalGoal->save();
                    $k++;
                }

                $l=0;
                foreach ($learningGoals as $learningGoal){
                    $learningGoal->hrComment = $learningComments[$l];
                    $learningGoal->save();
                    $l++;
                }

                $appraisal = Appraisal::find($appraisalID);

                $staffID = $appraisal->staffID;
                $supervisorID = $appraisal->supervisorID;

                $staff = Staff::find($staffID);
                $staff_email = $staff->user->email;

                $supervisor = Staff::find($supervisorID);
                $supervisor_email = $supervisor->user->email;

                $comment = $request->comment;

                Mail::to($staff_email)->send(new HrRejectGoal($staff, $appraisal));
                Mail::to($supervisor_email)->send(new HrSupervisorRejectGoal($staff, $appraisal));

                $appraisal->sentFlag = False;
                $appraisal->status = 5;

                $appraisal->save();

                Session::flash('success', 'Goals Rejected!');

                return redirect()->route('hrStaffGoals');

                break;

        }

    }


}
