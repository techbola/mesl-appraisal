<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Behavioural extends Model
{
	
    protected $fillable = [
        'behaviouralCat',
    ];

    public function behaviouralItems()
    {
        return $this->hasMany('App\BehaviouralItem', 'behaviouralCat_id');
    }

    public function behaviouralUserItems()
    {
        return $this->hasMany('App\BehaviouralItem', 'behaviouralCat_id')
            ->where('level_id', auth()->user()->level_id);
    }

}
