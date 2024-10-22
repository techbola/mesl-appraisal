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
use App\Mail\SendGoalsToHr;
use App\Mail\StaffSendAppraisal;
use App\Role;
use App\Staff;
use App\StaffBehaviouralItem;
use App\User;
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

        return view('supervisor.goals.appraisal')->with([
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
                    $financeGoal->justification = $financialComments[$i];
                    $financeGoal->save();
                    $i++;
                }

                $j=0;
                foreach ($customerGoals as $customerGoal){
                    $customerGoal->justification = $customerComments[$j];
                    $customerGoal->save();
                    $j++;
                }

                $k=0;
                foreach ($internalGoals as $internalGoal){
                    $internalGoal->justification = $internalComments[$k];
                    $internalGoal->save();
                    $k++;
                }

                $l=0;
                foreach ($learningGoals as $learningGoal){
                    $learningGoal->justification = $learningComments[$l];
                    $learningGoal->save();
                    $l++;
                }

                $appraisal = Appraisal::find($appraisalID);

                $staffID = $appraisal->staffID;

                $staff = Staff::find($staffID);
                $staff_email = $staff->user->email;

                Mail::to($staff_email)->send(new ApproveStaffGoals($staff, $appraisal));

                $appraisal->status = 2;

                $appraisal->save();

                Session::flash('success', 'Goals Approved!');

                return redirect()->route('supervisor.index');

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
                    $financeGoal->justification = $financialComments[$i];
                    $financeGoal->save();
                    $i++;
                }

                $j=0;
                foreach ($customerGoals as $customerGoal){
                    $customerGoal->justification = $customerComments[$j];
                    $customerGoal->save();
                    $j++;
                }

                $k=0;
                foreach ($internalGoals as $internalGoal){
                    $internalGoal->justification = $internalComments[$k];
                    $internalGoal->save();
                    $k++;
                }

                $l=0;
                foreach ($learningGoals as $learningGoal){
                    $learningGoal->justification = $learningComments[$l];
                    $learningGoal->save();
                    $l++;
                }

                $appraisal = Appraisal::find($appraisalID);

                $staffID = $appraisal->staffID;

                $staff = Staff::find($staffID);
                $staff_email = $staff->user->email;

                $appraisal->sentFlag = False;
                $appraisal->status = 3;

                $appraisal->save();

                Mail::to($staff_email)->send(new RejectStaffGoals($staff, $appraisal));

                Session::flash('success', 'Goals Rejected!');

                return redirect()->route('supervisor.index');

                break;

        }

    }

    public function submitToHr($appraisalID)
    {

        $users = Role::where('name', 'HR Supervisor')->first()->users()->get()->all();

        $hr = $users[0];

        $appraisal = Appraisal::find($appraisalID);

        $staffID = $appraisal->staffID;

        $staff = Staff::find($staffID);

        Mail::to($hr->email)->send(new SendGoalsToHr($staff));

        $appraisal->status = 4;
        $appraisal->hrID = $hr->staff->StaffRef;

        $appraisal->save();

        Session::flash('success', 'Goals Sent to HR!');

        return redirect()->route('supervisor.index');

    }

    public function supervisorNewGoal()
    {
        return view('supervisor.goals.new_goal.index');
    }

    public function allAppraisals()
    {

        $appraisals = Appraisal::where('StaffID', auth()->user()->staff->StaffRef)->get();

        return view('supervisor.goals.new_goal.queues')->with([
            'appraisals' => $appraisals
        ]);

    }

    public function dashboard($appraisalID)
    {

        $appraisal_finances = AppraisalFinance::where('staffID', auth()->user()->staff->StaffRef)
            ->where('appraisal_id', $appraisalID)->get();
        $appraisal_customers = AppraisalCustomer::where('staffID', auth()->user()->staff->StaffRef)->where('appraisal_id', $appraisalID)->get();
        $appraisal_internals = AppraisalInternal::where('staffID', auth()->user()->staff->StaffRef)->where('appraisal_id', $appraisalID)->get();
        $appraisal_learnings = AppraisalLearning::where('staffID', auth()->user()->staff->StaffRef)->where('appraisal_id', $appraisalID)->get();

        $comments = AppraisalComment::where('staffID', auth()->user()->staff->StaffRef)->first();
        $signatures = AppraisalSignature::where('staffID', auth()->user()->staff->StaffRef)->first();

        $behavioural = new Behavioural();
        $behaviourals = $behavioural->getUserBehaviourals();

        return view('supervisor.goals.new_goal.staff')->with([
            'appraisalID' => $appraisalID,
            'appraisal_finances' => $appraisal_finances,
            'appraisal_customers' => $appraisal_customers,
            'appraisal_internals' => $appraisal_internals,
            'appraisal_learnings' => $appraisal_learnings,
            'comments' => $comments,
            'signatures' => $signatures,
            'behaviourals' => $behaviourals,
        ]);

    }

    public function staffDetailsStore(Request $request)
    {

        $this->validate($request, [

            'employee_name' => 'required|string',
            'appraiser_period' => 'required|string',

        ]);

        $data = Appraisal::where('period', $request->appraiser_period)->where('StaffID', auth()->user()->staff->StaffRef)->first();

        if ($data){

            Session::flash('errorFlag', 'Appraisal for this period already started, check your queue.');

            return back();

        } else{

            $appraisal = new Appraisal;

            $staff = Staff::where('UserID', auth()->user()->id)->first();

            $appraisal->supervisorID = $staff->SupervisorID;
            $appraisal->staffID = $staff->StaffRef;
            $appraisal->employee_name = $request->employee_name;
            $appraisal->period = $request->appraiser_period;

            $appraisal->save();

            Session::flash('success', 'Saved, move to the next section.');

            return redirect()->route('supervisorDashboard', ['appraisalID' => $appraisal->id]);

        }

    }

    public function otherAppraisalStore(Request $request)
    {

        $this->validate($request, [

            'appraisee_comment' => 'required|string',
            'appraisee_sign' => 'required|image',

        ]);

        $appraisal = new AppraisalComment;

        $staff = Staff::where('UserID',auth()->user()->id)->first();

        $appraisal->staffID = $staff->StaffRef;
        $appraisal->supervisorID = $staff->SupervisorID;
        $appraisal->appraiseeComment = $request->appraisee_comment;
        $appraisal->appraisal_id = $request->appraisalID;

        $appraisal->save();

        // Get image file
        $image = $request->file('appraisee_sign');
        // Make a image name based on user name and current timestamp
        $name = str_slug($request->input('appraisee_sign')).'_'.time();
        // Define folder path
        $folder = '/uploads/appraisals/';
        // Make a file path where image will be stored [ folder path + file name + file extension]
        $filePath = $folder . $name. '.' . $image->getClientOriginalExtension();
        // Upload image
        $appraisee_sign = $this->uploadOne($image, $folder, 'public', $name);

        $appraisal2 = new AppraisalSignature;

        $appraisal2->staffID = $staff->StaffRef;
        $appraisal2->supervisorID = $staff->SupervisorID;
        $appraisal2->appraiseeSign = $filePath;
        $appraisal2->appraisal_id = $request->appraisalID;

        $appraisal2->save();

        Session::flash('success', 'Saved, move to the next section.');

        return redirect()->route('supervisorDashboard', ['appraisalID' => $request->appraisalID]);

    }

    public function editAppraisal($id)
    {

        $appraisal_finances = AppraisalFinance::where('appraisal_id', $id)->get();
        $appraisal_customers = AppraisalCustomer::where('appraisal_id', $id)->get();
        $appraisal_internals = AppraisalInternal::where('appraisal_id', $id)->get();
        $appraisal_learnings = AppraisalLearning::where('appraisal_id', $id)->get();

        $comments = AppraisalComment::where('appraisal_id', $id)->first();
        $signatures = AppraisalSignature::where('appraisal_id', $id)->first();

        $behavioural = new Behavioural();
        $behaviourals = $behavioural->getUserBehaviourals();
        $staffBehaviouralItems = StaffBehaviouralItem::where('appraisal_id', $id);

        return view('supervisor.goals.edit_goal.staff')->with([
            'appraisalID' => $id,
            'appraisal_finances' => $appraisal_finances,
            'appraisal_customers' => $appraisal_customers,
            'appraisal_internals' => $appraisal_internals,
            'appraisal_learnings' => $appraisal_learnings,
            'comments' => $comments,
            'signatures' => $signatures,
            'behaviourals' => $behaviourals,
            'staffBehaviouralItems' => $staffBehaviouralItems,
        ]);

    }

    public function rejectedGoalsa($id)
    {

        $appraisal_finances = AppraisalFinance::where('appraisal_id', $id)->get();
        $appraisal_customers = AppraisalCustomer::where('appraisal_id', $id)->get();
        $appraisal_internals = AppraisalInternal::where('appraisal_id', $id)->get();
        $appraisal_learnings = AppraisalLearning::where('appraisal_id', $id)->get();

        $comments = AppraisalComment::where('appraisal_id', $id)->first();
        $signatures = AppraisalSignature::where('appraisal_id', $id)->first();

        $behavioural = new Behavioural();
        $behaviourals = $behavioural->getUserBehaviourals();
        $staffBehaviouralItems = StaffBehaviouralItem::where('appraisal_id', $id);

        return view('supervisor.goals.rejected.staff')->with([
            'appraisalID' => $id,
            'appraisal_finances' => $appraisal_finances,
            'appraisal_customers' => $appraisal_customers,
            'appraisal_internals' => $appraisal_internals,
            'appraisal_learnings' => $appraisal_learnings,
            'comments' => $comments,
            'signatures' => $signatures,
            'behaviourals' => $behaviourals,
            'staffBehaviouralItems' => $staffBehaviouralItems,
        ]);

    }

    public function viewGoals($id)
    {

        $appraisal_finances = AppraisalFinance::where('appraisal_id', $id)->get();
        $appraisal_customers = AppraisalCustomer::where('appraisal_id', $id)->get();
        $appraisal_internals = AppraisalInternal::where('appraisal_id', $id)->get();
        $appraisal_learnings = AppraisalLearning::where('appraisal_id', $id)->get();

        $comments = AppraisalComment::where('appraisal_id', $id)->first();
        $signatures = AppraisalSignature::where('appraisal_id', $id)->first();

        $behavioural = new Behavioural();
        $behaviourals = $behavioural->getUserBehaviourals();
        $staffBehaviouralItems = StaffBehaviouralItem::where('appraisal_id', $id);

        return view('supervisor.goals.view_goals.staff')->with([
            'appraisalID' => $id,
            'appraisal_finances' => $appraisal_finances,
            'appraisal_customers' => $appraisal_customers,
            'appraisal_internals' => $appraisal_internals,
            'appraisal_learnings' => $appraisal_learnings,
            'comments' => $comments,
            'signatures' => $signatures,
            'behaviourals' => $behaviourals,
            'staffBehaviouralItems' => $staffBehaviouralItems,
        ]);

    }

    public function submitAppraisalSupervisor($id)
    {

        $appraisal = Appraisal::find($id);

        $supervisorID = $appraisal->supervisorID;

        $supervisor = Staff::find($supervisorID);
        $supervisor_email = $supervisor->user->email;

        Mail::to($supervisor_email)->send(new StaffSendAppraisal());

        $appraisal->sentFlag = true;
        $appraisal->status = 1;

        $appraisal->save();

        Session::flash('success', 'Appraisal Submitted!');

        return back();

    }


}
