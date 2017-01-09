<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Qcm;

class QcmController extends Controller
{
    //
    public function index()
    {
        $questions = Qcm::all();
        
        return view('back.qcm.index', compact('questions'));
    }
}
