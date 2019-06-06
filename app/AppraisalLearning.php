<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AppraisalLearning extends Model
{
    protected $fillable = [
        'staffID', 'supervisorID', 'objective', 'kpi', 'target', 'selfAssessment', 'constraint',
        'supervisorAssessment', 'weight', 'justification', 'appraisal_id',
    ];

    public function staff()
    {
        return $this->belongsTo('App\Staff');
    }
    
}
