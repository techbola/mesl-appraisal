<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AppraisalController extends Controller
{


    public function dashboard()
    {
        return view('appraisal.bsc');
    }

}
