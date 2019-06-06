<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BehaviouralItem extends Model
{
	protected $fillable = [
        'behaviouralCatID', 'behaviouralItemCat',
    ];
}
