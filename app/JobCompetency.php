<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobCompetency extends Model
{

    protected $fillable = [
        'staffID', 'supervisorID', 'self_starter', 'problem_solving', 'analytical_skill',
        'technical_skill', 'leadership', 'appraisal_id',
    ];

}
