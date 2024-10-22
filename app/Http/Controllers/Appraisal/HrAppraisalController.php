<?php

namespace App\Http\Controllers\Appraisal;

use App\Appraisal;
use App\AppraisalComment;
use App\AppraisalCustomer;
use App\AppraisalFinance;
use App\AppraisalInternal;
use App\AppraisalLearning;
use App\AppraisalSignature;
use App\Behavioural;
use App\BehaviouralItem;
use App\Staff;
use App\StaffAppraisal;
use App\StaffScoreReport;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use PDF;

class HrAppraisalController extends Controller
{

    public function hrStaffAppraisals()
    {

        $appraisals = Appraisal::where('hrID', auth()->user()->staff->StaffRef)
            ->where('appraisalStatus', 2)
            ->get()->all();

        return view('hr.appraisals.index')->with([
            'appraisals' => $appraisals,
        ]);

    }

    public function viewAppraisal($appraisalID)
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

        return view('hr.appraisals.appraisal')->with([
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

    public function viewScoreReport($appraisalID)
    {

        $staffAppraisals = new StaffScoreReport();

        $staffBsc = $staffAppraisals->bsc($appraisalID);

        $staffBehaviorals = $staffAppraisals->behavioural($appraisalID);

        $financial = $staffBsc['staffFinancial'];
        $customer = $staffBsc['staffCustomer'];
        $internal = $staffBsc['staffInternal'];
        $learning = $staffBsc['staffLearning'];

        $supervisor_financial = $staffBsc['supervisor_financial'];
        $supervisor_customer = $staffBsc['supervisor_customer'];
        $supervisor_internal = $staffBsc['supervisor_internal'];
        $supervisor_learning = $staffBsc['supervisor_learning'];

        $bscStaffScore = $staffBsc['bscStaffScore'];
        $bscSupervisorScore = $staffBsc['bscSupervisorScore'];

        $staffBehavioural = $staffBehaviorals['staffBehavioural'];
        $supervisorBehavioural = $staffBehaviorals['supervisorBehavioural'];

        $overallStaffScore = $bscStaffScore + $staffBehavioural;
        $overallSupervisorScore = $bscSupervisorScore + $supervisorBehavioural;

        return view('hr.appraisals.scrore_report')->with([
            'ap' => $staffBsc['ap'],
            'staffFinancial' => $financial,
            'staffCustomer' => $customer,
            'staffInternal' => $internal,
            'staffLearning' => $learning,
            'supervisor_financial' => $supervisor_financial,
            'supervisor_customer' => $supervisor_customer,
            'supervisor_internal' => $supervisor_internal,
            'supervisor_learning' => $supervisor_learning,
            'staffBehavioural' => $staffBehavioural,
            'supervisorBehavioural' => $supervisorBehavioural,
            'bscStaffScore' => $bscStaffScore,
            'bscSupervisorScore' => $bscSupervisorScore,
            'overallStaffScore' => $overallStaffScore,
            'overallSupervisorScore' => $overallSupervisorScore,
        ]);

    }

    public function allStaffIndexAppraisals()
    {

        return view('hr.appraisals.all_staffs_index');

    }

    public function allStaffAppraisals(Request $request)
    {

        $period = $request->appraiser_period;

        $appraisals = StaffAppraisal::where('period', $period)->get()->all();

        return view('hr.appraisals.all_staff')->with([
            'appraisals' => $appraisals,
            'period' => $period,
        ]);

    }

    public function downloadScoreReport($apID)
    {

        $ap = Appraisal::find($apID);

        $staffAppraisals = new StaffScoreReport();

        $staffBsc = $staffAppraisals->bsc($apID);

        $staffBehaviorals = $staffAppraisals->behavioural($apID);

        $financial = $staffBsc['staffFinancial'];
        $customer = $staffBsc['staffCustomer'];
        $internal = $staffBsc['staffInternal'];
        $learning = $staffBsc['staffLearning'];

        $supervisor_financial = $staffBsc['supervisor_financial'];
        $supervisor_customer = $staffBsc['supervisor_customer'];
        $supervisor_internal = $staffBsc['supervisor_internal'];
        $supervisor_learning = $staffBsc['supervisor_learning'];

        $bscStaffScore = $staffBsc['bscStaffScore'];
        $bscSupervisorScore = $staffBsc['bscSupervisorScore'];

        $staffBehavioural = $staffBehaviorals['staffBehavioural'];
        $supervisorBehavioural = $staffBehaviorals['supervisorBehavioural'];

        $overallStaffScore = $bscStaffScore + $staffBehavioural;
        $overallSupervisorScore = $bscSupervisorScore + $supervisorBehavioural;

        $data = [
            'staffName' => $ap->staff->user->getFullNameAttribute(),
            'period' => $ap->period,
            'staffFinancial' => $financial,
            'staffCustomer' => $customer,
            'staffInternal' => $internal,
            'staffLearning' => $learning,
            'supervisor_financial' => $supervisor_financial,
            'supervisor_customer' => $supervisor_customer,
            'supervisor_internal' => $supervisor_internal,
            'supervisor_learning' => $supervisor_learning,
            'staffBehavioural' => $staffBehavioural,
            'supervisorBehavioural' => $supervisorBehavioural,
            'bscStaffScore' => $bscStaffScore,
            'bscSupervisorScore' => $bscSupervisorScore,
            'overallStaffScore' => $overallStaffScore,
            'overallSupervisorScore' => $overallSupervisorScore,
        ];

//        dd($data);

        $pdf = PDF::loadView('hr.appraisals.score_report_pdf', compact('data'));
        return $pdf->download('score_report.pdf');

    }

}
