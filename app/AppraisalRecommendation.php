<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AppraisalRecommendation extends Model
{
    protected $fillable = [
        'staffID', 'supervisorID', 'promote', 'commendation', 'performance', 'exit',
    ];

    public function staff()
    {
        return $this->belongsTo('App\Staff', 'staffID');
    }
    
}
