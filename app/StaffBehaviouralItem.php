<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StaffBehaviouralItem extends Model
{
    protected $fillable = [
        'staffID', 'supervisorID', 'behaviouralCat_id', 'behaviouralItem_id', 'selfAssessment', 'supervisorAssessment',
        'supervisorComment', 'appraisal_id'
    ];

    public $primaryKey = 'id';

    public function staff()
    {
        return $this->belongsTo('App\Staff', 'staffID');
    }

    public function behaviouralItem()
    {
        return $this->belongsTo('App\BehaviouralItem', 'behaviouralItem_id');
    }

}
