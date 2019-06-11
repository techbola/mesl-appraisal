<?php

namespace App\Http\Controllers;

use App\Behavioural;
use App\BehaviouralItem;
use App\Level;
use Illuminate\Http\Request;

class HrController extends Controller
{

    public function index()
    {

        $behaviourals = Behavioural::all();

        return view('hr.index')->with([
            'behaviourals' => $behaviourals,
        ]);

    }

    public function behaviouralItems()
    {

        $behavioural_items = BehaviouralItem::all();
        $behaviourals = Behavioural::all();
        $levels = Level::all();

        return view('hr.behavioural_items')->with([
            'behavioural_items' => $behavioural_items,
            'behaviourals' => $behaviourals,
            'levels' => $levels,
        ]);

    }

}
