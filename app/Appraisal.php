<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appraisal extends Model
{

    protected $fillable = [
        'user_id', 'supervisor_id', 'employee_name', 'job_position', 'department', 'financial_objective', 'financial_kpi', 'financial_target',
        'financial_weight', 'financial_self_ass', 'stakeholders_objective', 'stakeholders_kpi', 'stakeholders_target',
        'stakeholders_weight', 'stakeholders_self_ass', 'internal_process_objective', 'internal_process_kpi',
        'internal_process_target', 'internal_process_weight', 'internal_process_self_ass', 'learning_objective',
        'learning_kpi', 'learning_target', 'learning_weight', 'learning_self_ass', 'appraisee_comment', 'team_work_self_ass',
        'responsibility_self_ass', 'integrity_self_ass', 'innovation_self_ass', 'passion_self_ass', 'self_starter_self_ass',
        'problem_solving_self_ass', 'analytical_skill_self_ass', 'technical_skill_self_ass', 'leadership_self_ass',
        'time_management_self_ass', 'punctuality_self_ass', 'policy_self_ass', 'process_mgt_self_ass', 'ethics_self_ass',
        'appraisee_sign', 'appraiser_designation', 'appraiser_name', 'appraiser_period', 'financial_supervisor_ass',
        'financial_justification', 'stakeholders_supervisor_ass', 'stakeholders_justification', 'internal_process_supervisor_ass',
        'internal_process_justification', 'learning_supervisor_ass', 'learning_justification', 'appraiser_comment',
        'recommendation_promote', 'recommendation_commendation', 'recommendation_performance', 'recommendation_exit',
        'training_need', 'team_work_supervisor_ass', 'responsibility_supervisor_ass', 'integrity_supervisor_ass',
        'innovation_supervisor_ass', 'passion_supervisor_ass', 'self_starter_supervisor_ass', 'problem_solving_supervisor_ass',
        'analytical_skill_supervisor_ass', 'technical_skill_supervisor_ass', 'leadership_supervisor_ass',
        'time_management_supervisor_ass', 'punctuality_supervisor_ass', 'policy_supervisor_ass', 'process_mgt_supervisor_ass',
        'ethics_supervisor_ass',
    ];

    public function staff()
    {
        return $this->belongsTo('App\Staff');
    }

}
