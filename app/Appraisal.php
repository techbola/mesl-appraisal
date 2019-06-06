<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appraisal extends Model
{

	protected $table = 'appraisal';
	
    protected $fillable = [
        'staffID', 'supervisorID', 'employee_name', 'job_position', 'department', 'period', 'appraiserDesignation', 'appraiserName',
    ];

    public function staff()
    {
        return $this->belongsTo('App\Staff');
    }

}
