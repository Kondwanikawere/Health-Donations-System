<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PatientsController extends Controller
{
    //
    public function viewPatients()
    {
        return view('patients.viewPatients');
    }

    public function registerPatients(){
        return view('patients.registerPatients');
    }

    public function editPatient(){
        return view('patients.editPatient');
    }
}
