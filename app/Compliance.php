<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Compliance extends Model
{

    protected $fillable = [
        'staffID', 'supervisorID', 'time_management', 'punctuality', 'policy', 'process_mgt', 'ethics', 'appraisal_id',
    ];

}
