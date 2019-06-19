<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AppraisalCustomer extends Model
{
    protected $fillable = [
        'staffID', 'supervisorID', 'objective', 'kpi', 'target', 'selfAssessment', 'constraint', 'supervisorAssessment',
        'weight', 'justification', 'appraisal_id', 'hrComment',
    ];

    public function staff()
    {
        return $this->belongsTo('App\Staff', 'staffID');
    }
    
}
