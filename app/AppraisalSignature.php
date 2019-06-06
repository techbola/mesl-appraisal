<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AppraisalSignature extends Model
{
    protected $fillable = [
        'staffID', 'supervisorID', 'appraiseeSign', 'appraiserSign', 'executiveSign', 'hrSign', 'appraisal_id',
    ];

    public function staff()
    {
        return $this->belongsTo('App\Staff');
    }
    
}
