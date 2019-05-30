<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\UploadTrait;
use App\Appraisal;

class AppraisalController extends Controller
{

    use UploadTrait;

    public function index()
    {
        return view('appraisal.bsc');
    }

    public function store(Request $request)
    {

        if (!auth()->user()->staff->SupervisorFlag){

            $this->validate($request, [

                'employee_name' => 'required|string',
                'job_position' => 'required|string',
                'department' => 'required|string',

                'financial_objective' => 'required|string',
                'financial_kpi' => 'required|string',
                'financial_target' => 'required|string',
                'financial_weight' => 'required|string',
                'financial_self_ass' => 'required|string',
                'stakeholders_objective' => 'required|string',
                'stakeholders_kpi' => 'required|string',
                'stakeholders_target' => 'required|string',
                'stakeholders_weight' => 'required|string',
                'stakeholders_self_ass' => 'required|string',
                'internal_process_objective' => 'required|string',
                'internal_process_kpi' => 'required|string',
                'internal_process_target' => 'required|string',
                'internal_process_weight' => 'required|string',
                'internal_process_self_ass' => 'required|string',
                'learning_objective' => 'required|string',
                'learning_kpi' => 'required|string',
                'learning_target' => 'required|string',
                'learning_weight' => 'required|string',
                'learning_self_ass' => 'required|string',
                'appraisee_comment' => 'required|string',

                'team_work_self_ass' => 'required|string',
                'responsibility_self_ass' => 'required|string',
                'integrity_self_ass' => 'required|string',
                'innovation_self_ass' => 'required|string',
                'passion_self_ass' => 'required|string',
                'self_starter_self_ass' => 'required|string',
                'problem_solving_self_ass' => 'required|string',
                'analytical_skill_self_ass' => 'required|string',
                'technical_skill_self_ass' => 'required|string',
                'leadership_self_ass' => 'required|string',
                'time_management_self_ass' => 'required|string',
                'punctuality_self_ass' => 'required|string',
                'policy_self_ass' => 'required|string',
                'process_mgt_self_ass' => 'required|string',
                'ethics_self_ass' => 'required|string',

                'appraisee_sign' => 'required|image',

            ]);

            $appraisal = new Appraisal;

            if ($request->has('appraisee_sign')){

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

                $appraisal->appraisee_sign = $appraisee_sign;

            }

        }

        if (auth()->user()->staff->SupervisorFlag){

            $this->validate($request, [

                'appraiser_designation' => 'required|string',
                'appraiser_name' => 'required|string',
                'appraiser_period' => 'required|string',

                'financial_supervisor_ass' => 'required|string',
                'financial_justification' => 'required|string',

                'stakeholders_supervisor_ass' => 'required|string',
                'stakeholders_justification' => 'required|string',

                'internal_process_supervisor_ass' => 'required|string',
                'internal_process_justification' => 'required|string',

                'learning_supervisor_ass' => 'required|string',
                'learning_justification' => 'required|string',

                'appraiser_comment' => 'required|string',

                'recommendation_promote' => 'required|string',
                'recommendation_commendation' => 'required|string',
                'recommendation_performance' => 'required|string',
                'recommendation_exit' => 'required|string',
                'training_need' => 'required|string',

                'team_work_supervisor_ass' => 'required|string',
                'responsibility_supervisor_ass' => 'required|string',
                'integrity_supervisor_ass' => 'required|string',
                'innovation_supervisor_ass' => 'required|string',
                'passion_supervisor_ass' => 'required|string',
                'self_starter_supervisor_ass' => 'required|string',
                'problem_solving_supervisor_ass' => 'required|string',
                'analytical_skill_supervisor_ass' => 'required|string',
                'technical_skill_supervisor_ass' => 'required|string',
                'leadership_supervisor_ass' => 'required|string',
                'time_management_supervisor_ass' => 'required|string',
                'punctuality_supervisor_ass' => 'required|string',
                'policy_supervisor_ass' => 'required|string',
                'process_mgt_supervisor_ass' => 'required|string',
                'ethics_supervisor_ass' => 'required|string',

            ]);

        }

    }

}
