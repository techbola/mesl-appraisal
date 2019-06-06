<?php

namespace App\Http\Controllers;

use App\Compliance;
use App\JobCompetency;
use App\Mail\StaffSendAppraisal;
use App\PersonalAttribute;
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
use function PHPSTORM_META\override;

class AppraisalController extends Controller
{

    use UploadTrait;

    public function index()
    {

        return view('appraisal.index');

    }


    public function allAppraisals()
    {

        $appraisals = Appraisal::where('StaffID', auth()->user()->staff->UserID)->get();

        return view('appraisal.queues')->with([
            'appraisals' => $appraisals
        ]);

    }

    public function dashboard()
    {

        if (!auth()->user()->staff->SupervisorFlag){

            $appraisalID = Session::get('appraisalID');

            $appraisal_finances = AppraisalFinance::where('StaffID', auth()->user()->staff->UserID)->get();
            $appraisal_customers = AppraisalCustomer::where('StaffID', auth()->user()->staff->UserID)->get();
            $appraisal_internals = AppraisalInternal::where('StaffID', auth()->user()->staff->UserID)->get();
            $appraisal_learnings = AppraisalLearning::where('StaffID', auth()->user()->staff->UserID)->get();

            $personal_attribute = PersonalAttribute::where('StaffID', auth()->user()->staff->UserID)->first();
            $job_competency = JobCompetency::where('StaffID', auth()->user()->staff->UserID)->first();
            $compliance = Compliance::where('StaffID', auth()->user()->staff->UserID)->first();

            return view('appraisal.staff')->with([
                'appraisalID' => $appraisalID,
                'appraisal_finances' => $appraisal_finances,
                'appraisal_customers' => $appraisal_customers,
                'appraisal_internals' => $appraisal_internals,
                'appraisal_learnings' => $appraisal_learnings,
                'personal_attribute' => $personal_attribute,
                'job_competency' => $job_competency,
                'compliance' => $compliance,
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

            $data = Appraisal::where('period', $request->appraiser_period)->first();

            if ($data){

                Session::flash('errorFlag', 'Appraisal for this period already started, check your queue.');

                return back();

            } else{

                $appraisal = new Appraisal;

                $staff = Staff::where('UserID',auth()->user()->id)->first();

                $appraisal->supervisorID = $staff->SupervisorID;
                $appraisal->staffID = $staff->UserID;
                $appraisal->employee_name = $request->employee_name;
                $appraisal->period = $request->appraiser_period;

                $appraisal->save();

                Session::flash('success', 'Submitted, move to the next section.');

                return redirect()->route('dashboard')->with([
                    'appraisalID' => $appraisal->id,
                ]);

            }


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
                $appraisal->appraisal_id = $request->appraisalID;
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
                $appraisal->appraisal_id = $request->appraisalID;
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
                $appraisal->appraisal_id = $request->appraisalID;
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
                $appraisal->appraisal_id = $request->appraisalID;
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
            $appraisal->appraisal_id = $request->appraisalID;

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
            $appraisal2->appraisal_id = $request->appraisalID;

            $appraisal2->save();

            Session::flash('success', 'Submitted, move to the next section.');

            return back();

        }

    }

    public function staffBehaviouralStore(Request $request)
    {

        if (!auth()->user()->staff->SupervisorFlag){

            $this->validate($request, [

                'team_work' => 'required|numeric',
                'responsibility' => 'required|numeric',
                'integrity' => 'required|numeric',
                'innovation' => 'required|numeric',
                'passion' => 'required|numeric',

                'self_starter' => 'required|numeric',
                'problem_solving' => 'required|numeric',
                'analytical_skill' => 'required|numeric',
                'technical_skill' => 'required|numeric',
                'leadership' => 'required|numeric',

                'time_management' => 'required|numeric',
                'punctuality' => 'required|numeric',
                'policy' => 'required|numeric',
                'process_mgt' => 'required|numeric',
                'ethics' => 'required|numeric',

            ]);

            $personal_attribute = new PersonalAttribute();
            $job_competency = new JobCompetency();
            $compliance = new Compliance();

            
            
            $staff = Staff::where('UserID',auth()->user()->id)->first();

            $personal_attribute->staffID = $staff->UserID;
            $personal_attribute->supervisorID = $staff->SupervisorID;
            $personal_attribute->team_work = $request->team_work;
            $personal_attribute->responsibility = $request->responsibility;
            $personal_attribute->integrity = $request->integrity;
            $personal_attribute->innovation = $request->innovation;
            $personal_attribute->passion = $request->passion;
            $personal_attribute->appraisal_id = $request->appraisalID;
            $personal_attribute->save();

            $job_competency->staffID = $staff->UserID;
            $job_competency->supervisorID = $staff->SupervisorID;
            $job_competency->self_starter = $request->self_starter;
            $job_competency->problem_solving = $request->problem_solving;
            $job_competency->analytical_skill = $request->analytical_skill;
            $job_competency->technical_skill = $request->technical_skill;
            $job_competency->leadership = $request->leadership;
            $job_competency->appraisal_id = $request->appraisalID;
            $job_competency->save();

            $compliance->staffID = $staff->UserID;
            $compliance->supervisorID = $staff->SupervisorID;
            $compliance->time_management = $request->time_management;
            $compliance->punctuality = $request->punctuality;
            $compliance->policy = $request->policy;
            $compliance->process_mgt = $request->process_mgt;
            $compliance->ethics = $request->ethics;
            $compliance->appraisal_id = $request->appraisalID;
            $compliance->save();

            // Mail::to($supervisor_email)->send(new StaffSendAppraisal($supervisor, $staff));

            Session::flash('success', 'Appraisal Submitted.');

            return back();

        }

    }

    public function editAppraisal($id)
    {

        $appraisal_finances = AppraisalFinance::where('StaffID', auth()->user()->staff->UserID)
                                                    ->where('appraisal_id', $id)->get();
        $appraisal_customers = AppraisalCustomer::where('StaffID', auth()->user()->staff->UserID)
                                                    ->where('appraisal_id', $id)->get();
        $appraisal_internals = AppraisalInternal::where('StaffID', auth()->user()->staff->UserID)
                                                    ->where('appraisal_id', $id)->get();
        $appraisal_learnings = AppraisalLearning::where('StaffID', auth()->user()->staff->UserID)
                                                    ->where('appraisal_id', $id)->get();

        $personal_attribute = PersonalAttribute::where('StaffID', auth()->user()->staff->UserID)
                                                    ->where('appraisal_id', $id)->first();
        $job_competency = JobCompetency::where('StaffID', auth()->user()->staff->UserID)
                                            ->where('appraisal_id', $id)->first();
        $compliance = Compliance::where('StaffID', auth()->user()->staff->UserID)
                                    ->where('appraisal_id', $id)->first();

        return view('appraisal.staff')->with([
            'appraisalID' => $id,
            'appraisal_finances' => $appraisal_finances,
            'appraisal_customers' => $appraisal_customers,
            'appraisal_internals' => $appraisal_internals,
            'appraisal_learnings' => $appraisal_learnings,
            'personal_attribute' => $personal_attribute,
            'job_competency' => $job_competency,
            'compliance' => $compliance,
        ]);

    }

    public function deleteAppraisal($id)
    {
        $appraisal = Appraisal::find($id);

        $appraisal->delete();

        Session::flash('success', 'Appraisal Deleted.');

        return back();

    }

}
