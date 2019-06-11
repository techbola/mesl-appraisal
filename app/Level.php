<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{

    protected $fillable = ['name'];

    public $primaryKey = 'id';

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function behavioural_item()
    {
        return $this->belongsTo('App\BehaviouralItem', 'level_id');
    }

}
