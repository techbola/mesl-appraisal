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
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
        $ap = Appraisal::find($appraisalID);

        $appraisal_finances = AppraisalFinance::where('appraisal_id', $appraisalID)->get();
        $appraisal_customers = AppraisalCustomer::where('appraisal_id', $appraisalID)->get();
        $appraisal_internals = AppraisalInternal::where('appraisal_id', $appraisalID)->get();
        $appraisal_learnings = AppraisalLearning::where('appraisal_id', $appraisalID)->get();

        $financeSelfAssessments = [];
        $customerSelfAssessments = [];
        $internalSelfAssessments = [];
        $learningSelfAssessments = [];

        $financeSupervisorAssessments = [];
        $customerSupervisorAssessments = [];
        $internalSupervisorAssessments = [];
        $learningSupervisorAssessments = [];

        $totalFinanceSelfAssessments= 0;
        $totalCustomerSelfAssessments= 0;
        $totalInternalSelfAssessments= 0;
        $totalLearningSelfAssessments= 0;

        $totalFinanceSupervisorAssessments= 0;
        $totalCustomerSupervisorAssessments= 0;
        $totalInternalSupervisorAssessments= 0;
        $totalLearningSupervisorAssessments= 0;

        foreach ($appraisal_finances as $appraisal_finance){
            array_push($financeSelfAssessments, $appraisal_finance->selfAssessment);
            array_push($financeSupervisorAssessments, $appraisal_finance->supervisorAssessment);
            $totalFinanceSelfAssessments = $totalFinanceSelfAssessments + $appraisal_finance->selfAssessment;
            $totalFinanceSupervisorAssessments = $totalFinanceSupervisorAssessments + $appraisal_finance->supervisorAssessment;
        }

        foreach ($appraisal_customers as $appraisal_customer){
            array_push($customerSelfAssessments, $appraisal_customer->selfAssessment);
            array_push($customerSupervisorAssessments, $appraisal_customer->supervisorAssessment);
            $totalCustomerSelfAssessments = $totalCustomerSelfAssessments + $appraisal_customer->selfAssessment;
            $totalCustomerSupervisorAssessments = $totalCustomerSupervisorAssessments + $appraisal_customer->supervisorAssessment;
        }

        foreach ($appraisal_internals as $appraisal_internal){
            array_push($internalSelfAssessments, $appraisal_internal->selfAssessment);
            array_push($internalSupervisorAssessments, $appraisal_internal->supervisorAssessment);
            $totalInternalSelfAssessments = $totalInternalSelfAssessments + $appraisal_internal->selfAssessment;
            $totalInternalSupervisorAssessments = $totalInternalSupervisorAssessments + $appraisal_internal->supervisorAssessment;
        }

        foreach ($appraisal_learnings as $appraisal_learning){
            array_push($learningSelfAssessments, $appraisal_learning->selfAssessment);
            array_push($learningSupervisorAssessments, $appraisal_learning->supervisorAssessment);
            $totalLearningSelfAssessments = $totalLearningSelfAssessments + $appraisal_learning->selfAssessment;
            $totalLearningSupervisorAssessments = $totalLearningSupervisorAssessments + $appraisal_learning->supervisorAssessment;
        }

        $financial_D = count($financeSelfAssessments) * 5;
        $customer_D = count($customerSelfAssessments) * 5;
        $internal_D = count($internalSelfAssessments) * 5;
        $learning_D = count($learningSelfAssessments) * 5;

        $financial = ($totalFinanceSelfAssessments / $financial_D) * 100;
        $customer = ($totalCustomerSelfAssessments / $customer_D) * 100;
        $internal = ($totalInternalSelfAssessments / $internal_D) * 100;
        $learning = ($totalLearningSelfAssessments / $learning_D) * 100;

        $supervisor_financial = ($totalFinanceSupervisorAssessments / $financial_D) * 100;
        $supervisor_customer = ($totalCustomerSupervisorAssessments / $customer_D) * 100;
        $supervisor_internal = ($totalInternalSupervisorAssessments / $internal_D) * 100;
        $supervisor_learning = ($totalLearningSupervisorAssessments / $learning_D) * 100;

        $bscStaffScore = (($financial + $customer + $internal + $learning) / 400) * 90;
        $bscStaffScore = round($bscStaffScore, 2);
        $bscSupervisorScore = (($supervisor_financial + $supervisor_customer + $supervisor_internal + $supervisor_learning) / 400) * 90;
        $bscSupervisorScore = round($bscSupervisorScore, 2);

        $staff = Staff::find($ap->staffID);

        $staffBehaviouralCats = [];

        $staff_behavioural_items_catids = BehaviouralItem::where('level_id', $staff->user->level_id)->pluck('behaviouralCat_id')->all();

        foreach ($staff_behavioural_items_catids as $staff_behavioural_items_catid){
            array_push($staffBehaviouralCats, (int) $staff_behavioural_items_catid);
        }

        $behaviourals = Behavioural::pluck('id')->all();

        $behaviourals2 = array_intersect ($behaviourals, $staffBehaviouralCats);

        $behaviourals3 = Behavioural::whereIn('id', $behaviourals2)->get()->all();

        $staffBehaviouralAssessments = [];
        $supervisorBehaviouralAssessments = [];

        $totalStaffBehaviouralAssessments = 0;
        $totalSupervisorBehaviouralAssessments = 0;

        foreach ($behaviourals3 as $behavioural) {

            foreach ($behavioural->behaviouralStaffItems($staff->user->level_id) as $behavioural_item) {
                array_push($staffBehaviouralAssessments, $behavioural_item->staffBehaviouralItem->selfAssessment);
                array_push($supervisorBehaviouralAssessments, $behavioural_item->staffBehaviouralItem->supervisorAssessment);

                $totalStaffBehaviouralAssessments = $totalStaffBehaviouralAssessments + $behavioural_item->staffBehaviouralItem->selfAssessment;
                $totalSupervisorBehaviouralAssessments = $totalSupervisorBehaviouralAssessments + $behavioural_item->staffBehaviouralItem->supervisorAssessment;
            }

        }

        $deno = count($staffBehaviouralAssessments) * 20;

        $staffBehavioural = ($totalStaffBehaviouralAssessments / $deno) * 100;
        $staffBehavioural = $staffBehavioural / 10;
        $staffBehavioural = round($staffBehavioural, 2);

        $supervisorBehavioural = ($totalSupervisorBehaviouralAssessments / $deno) * 100;
        $supervisorBehavioural = $supervisorBehavioural / 10;
        $supervisorBehavioural = round($supervisorBehavioural, 2);

        $overallStaffScore = $bscStaffScore + $staffBehavioural;
        $overallSupervisorScore = $bscSupervisorScore + $supervisorBehavioural;

        return view('hr.appraisals.scrore_report')->with([
            'ap' => $ap,
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

        $appraisals = Appraisal::where('hrID', auth()->user()->staff->StaffRef)
            ->where('appraisalStatus', 2)
            ->where('period', $period)
            ->get()->all();

        return view('hr.appraisals.all_staff')->with([
            'appraisals' => $appraisals,
            'period' => $period,
        ]);

    }

}
