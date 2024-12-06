<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HealthWorker extends Controller
{
    //
    public function healthWorkerRegister(){
        return view('healthWorker.healthWorkerRegister');
    }
}
