<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PersonalAttribute extends Model
{

    protected $fillable = [
        'staffID', 'supervisorID', 'team_work', 'responsibility', 'integrity', 'innovation', 'passion', 'appraisal_id',
    ];

}
