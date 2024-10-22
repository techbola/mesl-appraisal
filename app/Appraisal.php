<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appraisal extends Model
{

	protected $table = 'appraisal';
	
    protected $fillable = [
        'staffID', 'supervisorID', 'hrID', 'employee_name', 'job_position', 'department', 'period', 'appraiserDesignation',
        'appraiserName', 'status', 'sentFlag', 'supervisorComment', 'appraisalStatus', 'startAppraisalFlag'
    ];

    protected $primaryKey = 'id';

    public function staff()
    {
        return $this->belongsTo('App\Staff', 'staffID');
    }

}
