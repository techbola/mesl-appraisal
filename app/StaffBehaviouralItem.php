<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StaffBehaviouralItem extends Model
{
    protected $fillable = [
        'staffID', 'supervisorID', 'behaviouralCatID', 'behaviouralItemCatID', 'selfAssessment', 'supervisorAssessment',
    ];

    public function staff()
    {
        return $this->belongsTo('App\Staff');
    }

}
