<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{

    protected $fillable = ['name'];

    public $primaryKey = 'id';

    public function users()
    {
        return $this->hasMany('App\User', 'level_id');
    }

    public function behavioural_item()
    {
        return $this->belongsTo('App\BehaviouralItem', 'level_id');
    }

}
