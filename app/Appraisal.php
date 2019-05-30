<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appraisal extends Model
{

    protected $fillable = [];

    public function staff()
    {
        return $this->belongsTo('App\Staff');
    }

}
