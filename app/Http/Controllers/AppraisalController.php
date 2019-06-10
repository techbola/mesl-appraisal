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

        $appraisals = Appraisal::where('StaffID', auth()->user()->staff->StaffRef)->get();

        return view('appraisal.queues')->with([
            'appraisals' => $appraisals
        ]);

    }

    public function dashboard($appraisalID)
    {

        if (!auth()->user()->staff->SupervisorFlag){

            $appraisal_finances = AppraisalFinance::where('staffID', auth()->user()->staff->StaffRef)
                                                    ->where('appraisal_id', $appraisalID)->get();
            $appraisal_customers = AppraisalCustomer::where('staffID', auth()->user()->staff->StaffRef)->where('appraisal_id', $appraisalID)->get();
            $appraisal_internals = AppraisalInternal::where('staffID', auth()->user()->staff->StaffRef)->where('appraisal_id', $appraisalID)->get();
            $appraisal_learnings = AppraisalLearning::where('staffID', auth()->user()->staff->StaffRef)->where('appraisal_id', $appraisalID)->get();

            $personal_attribute = PersonalAttribute::where('staffID', auth()->user()->staff->StaffRef)->first();
            $job_competency = JobCompetency::where('staffID', auth()->user()->staff->StaffRef)->first();
            $compliance = Compliance::where('staffID', auth()->user()->staff->StaffRef)->first();

            $comments = AppraisalComment::where('staffID', auth()->user()->staff->StaffRef)->first();
            $signatures = AppraisalSignature::where('staffID', auth()->user()->staff->StaffRef)->first();

            return view('appraisal.staff')->with([
                'appraisalID' => $appraisalID,
                'appraisal_finances' => $appraisal_finances,
                'appraisal_customers' => $appraisal_customers,
                'appraisal_internals' => $appraisal_internals,
                'appraisal_learnings' => $appraisal_learnings,
                'personal_attribute' => $personal_attribute,
                'job_competency' => $job_competency,
                'compliance' => $compliance,
                'comments' => $comments,
                'signatures' => $signatures,
            ]);

        }
        elseif (auth()->user()->staff->SupervisorFlag){

            return redirect()->route('supervisor.index');

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
                $appraisal->staffID = $staff->StaffRef;
                $appraisal->employee_name = $request->employee_name;
                $appraisal->period = $request->appraiser_period;

                $appraisal->save();

                Session::flash('success', 'Saved, move to the next section.');

                return redirect()->route('dashboard', ['appraisalID' => $appraisal->id]);

            }


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

            return redirect()->route('dashboard', ['appraisalID' => $request->appraisalID]);

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

            $personal_attribute->staffID = $staff->StaffRef;
            $personal_attribute->supervisorID = $staff->SupervisorID;
            $personal_attribute->team_work = $request->team_work;
            $personal_attribute->responsibility = $request->responsibility;
            $personal_attribute->integrity = $request->integrity;
            $personal_attribute->innovation = $request->innovation;
            $personal_attribute->passion = $request->passion;
            $personal_attribute->appraisal_id = $request->appraisalID;
            $personal_attribute->save();

            $job_competency->staffID = $staff->StaffRef;
            $job_competency->supervisorID = $staff->SupervisorID;
            $job_competency->self_starter = $request->self_starter;
            $job_competency->problem_solving = $request->problem_solving;
            $job_competency->analytical_skill = $request->analytical_skill;
            $job_competency->technical_skill = $request->technical_skill;
            $job_competency->leadership = $request->leadership;
            $job_competency->appraisal_id = $request->appraisalID;
            $job_competency->save();

            $compliance->staffID = $staff->StaffRef;
            $compliance->supervisorID = $staff->SupervisorID;
            $compliance->time_management = $request->time_management;
            $compliance->punctuality = $request->punctuality;
            $compliance->policy = $request->policy;
            $compliance->process_mgt = $request->process_mgt;
            $compliance->ethics = $request->ethics;
            $compliance->appraisal_id = $request->appraisalID;
            $compliance->save();

            Session::flash('success', 'Saved!');

            return redirect()->route('dashboard', ['appraisalID' => $request->appraisalID]);

        }

    }

    public function editAppraisal($id)
    {

        $appraisal_finances = AppraisalFinance::where('appraisal_id', $id)->get();
        $appraisal_customers = AppraisalCustomer::where('appraisal_id', $id)->get();
        $appraisal_internals = AppraisalInternal::where('appraisal_id', $id)->get();
        $appraisal_learnings = AppraisalLearning::where('appraisal_id', $id)->get();

        $personal_attribute = PersonalAttribute::where('appraisal_id', $id)->first();
        $job_competency = JobCompetency::where('appraisal_id', $id)->first();
        $compliance = Compliance::where('appraisal_id', $id)->first();

        $comments = AppraisalComment::where('appraisal_id', $id)->first();
        $signatures = AppraisalSignature::where('appraisal_id', $id)->first();

        return view('appraisal.staff')->with([
            'appraisalID' => $id,
            'appraisal_finances' => $appraisal_finances,
            'appraisal_customers' => $appraisal_customers,
            'appraisal_internals' => $appraisal_internals,
            'appraisal_learnings' => $appraisal_learnings,
            'personal_attribute' => $personal_attribute,
            'job_competency' => $job_competency,
            'compliance' => $compliance,
            'comments' => $comments,
            'signatures' => $signatures,
        ]);

    }

    public function submitAppraisalHR($id)
    {

        $appraisal = Appraisal::find($id);

        $supervisorID = $appraisal->supervisorID;

        $supervisor = Staff::find($supervisorID);
        $supervisor_email = $supervisor->user->email;

//        dd($supervisor_email);

        Mail::to($supervisor_email)->send(new StaffSendAppraisal());

        $appraisal->sentFlag = true;
        $appraisal->status = 1;

        $appraisal->save();

        Session::flash('success', 'Appraisal Submitted!');

        return back();

    }

    public function deleteAppraisal($id)
    {
        $appraisal = Appraisal::find($id);

        $appraisal->delete();

        Session::flash('success', 'Appraisal Deleted.');

        return back();

    }

    public function deleteAppraisalComment($id)
    {
        $appraisal = AppraisalComment::find($id);

        $appraisal->delete();

        Session::flash('success', 'Comment Deleted.');

        return back();

    }

    public function updateAppraisalComment(Request $request)
    {

//        dd($request->all());

        $this->validate($request, [
            'appraiseeComment' => 'required|string',
        ]);

        $appraisal = AppraisalComment::find($request->commentID);

//        dd($appraisal);

        $appraisal->appraiseeComment = $request->appraiseeComment;

        $appraisal->save();

        Session::flash('success', 'Comment Updated!.');

        return back();

    }

    public function deleteAppraisalSignature($id)
    {
        $appraisal = AppraisalSignature::find($id);

        $appraisal->delete();

        Session::flash('success', 'Signature Deleted.');

        return back();

    }

    public function updateAppraisalSign(Request $request)
    {

        $this->validate($request, [
            'appraiseeSign' => 'required|image',
        ]);

        $appraisal = AppraisalSignature::find($request->signatureID);

        // Get image file
        $image = $request->file('appraiseeSign');
        // Make a image name based on user name and current timestamp
        $name = str_slug($request->input('appraiseeSign')).'_'.time();
        // Define folder path
        $folder = '/uploads/appraisals/';
        // Make a file path where image will be stored [ folder path + file name + file extension]
        $filePath = $folder . $name. '.' . $image->getClientOriginalExtension();
        // Upload image
        $appraisee_sign = $this->uploadOne($image, $folder, 'public', $name);

//        dd($filePath);

        $appraisal->appraiseeSign = $filePath;
        $appraisal->save();

        Session::flash('success', 'Signature Updated!.');

        return back();

    }

}
