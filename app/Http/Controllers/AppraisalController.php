<?php

namespace App\Http\Controllers;

use App\Mail\StaffSendAppraisal;
use App\Staff;
use App\User;
use Illuminate\Http\Request;
use App\Traits\UploadTrait;
use App\Appraisal;
use App\AppraisalComment;
use App\AppraisalCustomer;
use App\AppraisalFinance;
use App\AppraisalInternal;
use App\AppraisalLearning;
use App\AppraisalRecommendation;
use App\AppraisalSignature;
use App\AppraisalTraining;
use App\StaffBehaviouralItem;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class AppraisalController extends Controller
{

    use UploadTrait;

    public function users()
    {
        $users = User::all();
        dd($users);
    }

    public function index()
    {

        if (!auth()->user()->staff->SupervisorFlag){

            $appraisal_period = Appraisal::where('StaffID', auth()->user()->staff->UserID)->first();
            $period = $appraisal_period;

            return view('appraisal.staff')->with([
                'appraisal_period' => $period,
            ]);

        }
        elseif (auth()->user()->staff->SupervisorFlag){

            $staffs = Staff::where('SupervisorID', auth()->user()->staff->staffRef)->get()->all();
            // dd(count($staffs));
            return view('supervisor.index', compact('staffs'));

    }

    }

    public function staffDetailsStore(Request $request)
    {

        if (!auth()->user()->staff->SupervisorFlag){

            $this->validate($request, [

                'employee_name' => 'required|string',
               // 'job_position' => 'required|string',
               // 'department' => 'required|string',
               'appraiser_period' => 'required|string',

            ]);

            $appraisal = new Appraisal;

            $staff = Staff::where('UserID',auth()->user()->id)->first();

            $appraisal->supervisorID = $staff->SupervisorID;
            $appraisal->staffID = $staff->UserID;
            $appraisal->employee_name = $request->employee_name;
            $appraisal->period = $request->appraiser_period;

            $appraisal->save();

            Session::flash('success', 'Submitted, move to the next section.');

            return back();

        }

    }

    public function bscFinancialStore(Request $request)
    {

        if (!auth()->user()->staff->SupervisorFlag){

            $this->validate($request, [
                'financial_objective.*' => 'required|string',
                'financial_kpi.*' => 'required|string',
                'financial_target.*' => 'required|string',
                'financial_constraint.*' => 'required|string',
                'financial_self_ass.*' => 'required|numeric',
            ]);

            $staff = Staff::where('UserID',auth()->user()->id)->first();

            for($i=0;$i<count($request->financial_objective);$i++){

                $appraisal = new AppraisalFinance;
                $appraisal->objective = $request->financial_objective[$i];
                $appraisal->kpi = $request->financial_kpi[$i];
                $appraisal->target = $request->financial_target[$i];
                $appraisal->constraint = $request->financial_constraint[$i];
                $appraisal->selfAssessment = $request->financial_self_ass[$i];
                $appraisal->supervisorID = $staff->SupervisorID;
                $appraisal->staffID = $staff->UserID;
                $appraisal->save();

            }

            Session::flash('success', 'Submitted, move to the next section.');

            return back();

        }

    }

    public function bscCustomerStore(Request $request)
    {

        if (!auth()->user()->staff->SupervisorFlag){

            $this->validate($request, [

                'stakeholders_objective.*' => 'required|string',
                'stakeholders_kpi.*' => 'required|string',
                'stakeholders_target.*' => 'required|string',
                'stakeholders_constraint.*' => 'required|string',
                'stakeholders_self_ass.*' => 'required|numeric',

            ]);

            $staff = Staff::where('UserID',auth()->user()->id)->first();

            for($i=0;$i<count($request->financial_objective);$i++){
                
                $appraisal = new AppraisalCustomer;
                $appraisal->objective = $request->stakeholders_objective[$i];
                $appraisal->kpi = $request->stakeholders_kpi[$i];
                $appraisal->target = $request->stakeholders_target[$i];
                $appraisal->constraint = $request->stakeholders_constraint[$i];
                $appraisal->selfAssessment = $request->stakeholders_self_ass[$i];
                $appraisal->supervisorID = $staff->SupervisorID;
                $appraisal->staffID = $staff->UserID;
                $appraisal->save();

            }

            Session::flash('success', 'Submitted, move to the next section.');

            return back();

        }

    }

    public function bscInternalStore(Request $request)
    {

        if (!auth()->user()->staff->SupervisorFlag){

            $this->validate($request, [

                'internal_process_objective.*' => 'required|string',
                'internal_process_kpi.*' => 'required|string',
                'internal_process_target.*' => 'required|string',
                'internal_process_constraint.*' => 'required|string',
                'internal_process_self_ass.*' => 'required|numeric',

            ]);

            $staff = Staff::where('UserID',auth()->user()->id)->first();

            for($i=0;$i<count($request->financial_objective);$i++){
                
                $appraisal = new AppraisalInternal;
                $appraisal->objective = $request->internal_process_objective[$i];
                $appraisal->kpi = $request->internal_process_kpi[$i];
                $appraisal->target = $request->internal_process_target[$i];
                $appraisal->constraint = $request->internal_process_constraint[$i];
                $appraisal->selfAssessment = $request->internal_process_self_ass[$i];
                $appraisal->supervisorID = $staff->SupervisorID;
                $appraisal->staffID = $staff->UserID;
                $appraisal->save();

            }

            Session::flash('success', 'Submitted, move to the next section.');

            return back();

        }

    }

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

            for($i=0;$i<count($request->financial_objective);$i++){
                
                $appraisal = new AppraisalLearning;
                $appraisal->objective = $request->learning_objective[$i];
                $appraisal->kpi = $request->learning_kpi[$i];
                $appraisal->target = $request->learning_target[$i];
                $appraisal->constraint = $request->learning_constraint[$i];
                $appraisal->selfAssessment = $request->learning_self_ass[$i];
                $appraisal->supervisorID = $staff->SupervisorID;
                $appraisal->staffID = $staff->UserID;
                $appraisal->save();

            }

            Session::flash('success', 'Submitted, move to the next section.');

            return back();

        }

    }

    public function otherAppraisalStore(Request $request)
    {

        if (!auth()->user()->staff->SupervisorFlag){

            $this->validate($request, [

                'appraisee_comment' => 'required|string',
                'appraisee_sign' => 'required|image',

            ]);

            $appraisal = new AppraisalComment;

            $staff = Staff::where('UserID',auth()->user()->id)->first();

            $appraisal->staffID = $staff->UserID;
            $appraisal->supervisorID = $staff->SupervisorID;
            $appraisal->appraiseeComment = $request->appraisee_comment;

            $appraisal->save();

            // Get image file
            $image = $request->file('appraisee_sign');
            // Make a image name based on user name and current timestamp
            $name = str_slug($request->input('appraisee_sign')).'_'.time();
            // Define folder path
            $folder = '/uploads/images';
            // Make a file path where image will be stored [ folder path + file name + file extension]
            $filePath = $folder . $name. '.' . $image->getClientOriginalExtension();
            // Upload image
            $appraisee_sign = $this->uploadOne($image, $folder, 'public', $name);

            $appraisal2 = new AppraisalSignature;

            $appraisal2->staffID = $staff->UserID;
            $appraisal2->supervisorID = $staff->SupervisorID;
            $appraisal2->appraiseeSign = $filePath;

            $appraisal2->save();

            Session::flash('success', 'Submitted, move to the next section.');

            return back();

        }

    }

    public function staffBehaviouralStore(Request $request)
    {

        if (!auth()->user()->staff->SupervisorFlag){

            $this->validate($request, [

                'team_work_self_ass' => 'required|numeric',
                'responsibility_self_ass' => 'required|numeric',
                'integrity_self_ass' => 'required|numeric',
                'innovation_self_ass' => 'required|numeric',
                'passion_self_ass' => 'required|numeric',

                'self_starter_self_ass' => 'required|numeric',
                'problem_solving_self_ass' => 'required|numeric',
                'analytical_skill_self_ass' => 'required|numeric',
                'technical_skill_self_ass' => 'required|numeric',
                'leadership_self_ass' => 'required|numeric',

                'time_management_self_ass' => 'required|numeric',
                'punctuality_self_ass' => 'required|numeric',
                'policy_self_ass' => 'required|numeric',
                'process_mgt_self_ass' => 'required|numeric',
                'ethics_self_ass' => 'required|numeric',

            ]);

            $behavioural = new StaffBehaviouralItem;

            
            
            $staff = Staff::where('UserID',auth()->user()->id)->first();
            $behavioural->staffID = $staff->UserID;
            $behavioural->supervisorID = $staff->SupervisorID;

            // Mail::to($supervisor_email)->send(new StaffSendAppraisal($supervisor, $staff));

            Session::flash('success', 'Appraisal Submitted.');

            return back();

        }

    }

}
