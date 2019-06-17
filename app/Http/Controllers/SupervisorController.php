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
use App\Mail\ApproveStaffGoals;
use App\Mail\RejectStaffGoals;
use App\Staff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class SupervisorController extends Controller
{

    public function index()
    {

        $appraisals = Appraisal::where('supervisorID', auth()->user()->staff->StaffRef)
            ->where('sentFlag', True)
            ->get()->all();

        return view('supervisor.index')->with([
            'appraisals' => $appraisals,
        ]);

    }

    public function appraisal($appraisalID)
    {

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

        return view('supervisor.appraisal')->with([
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
        ]);

    }

    public function goalsApproval(Request $request, $appraisalID)
    {

        switch ($request->input('action')) {
            case 'approve':

                $appraisal = Appraisal::find($appraisalID);

                $staffID = $appraisal->staffID;

                $staff = Staff::find($staffID);
                $staff_email = $staff->user->email;

//                dd($staff_email);

                if (!empty($request->comment)){

                    $comment = $request->comment;

                    Mail::to($staff_email)->send(new ApproveStaffGoals($staff, $appraisal));

                    $appraisal->supervisorComment = $comment;
                    $appraisal->status = 2;

                    $appraisal->save();

                }
                else{

                    Mail::to($staff_email)->send(new ApproveStaffGoals($staff, $appraisal));

                    $appraisal->status = 2;

                    $appraisal->save();

                }

                Session::flash('success', 'Goals Approved!');

                return redirect()->route('supervisor.index');

                break;

            case 'reject':

                $this->validate($request, [
                   'comment' => 'required|string|min:5'
                ]);

                $appraisal = Appraisal::find($appraisalID);

                $staffID = $appraisal->staffID;

                $staff = Staff::find($staffID);
                $staff_email = $staff->user->email;

//                dd($staff_email);

                $comment = $request->comment;

                Mail::to($staff_email)->send(new RejectStaffGoals($staff, $appraisal));

                $appraisal->supervisorComment = $comment;
                $appraisal->sentFlag = False;
                $appraisal->status = 3;

                $appraisal->save();

                Session::flash('success', 'Goals Rejected!');

                return redirect()->route('supervisor.index');

                break;

        }

    }

}
