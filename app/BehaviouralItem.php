<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BehaviouralItem extends Model
{

	protected $fillable = [
        'behaviouralCat_id', 'level_id', 'behaviouralItem', 'weight',
    ];

    public $primaryKey = 'id';

    public function behavioural()
    {
        return $this->belongsTo('App\Behavioural', 'behaviouralCat_id');
	}

    public function level()
    {
        return $this->belongsTo('App\Level', 'level_id');
    }

}
